<?php

namespace Modules\BusinessDays\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

define('BUSINESS_DAYS_MODULE', 'businessdays');

class BusinessDaysServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../Config/config.php', 'businessdays');
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'businessdays');
        $this->registerHooks();
    }

    public function register(): void {}

    protected function registerHooks(): void
    {
        // -----------------------------------------------------------------------
        // Hook 1: workflows.conditions_config
        // Fired in Workflow::conditionsConfig() when building the UI dropdown.
        // Signature: filter(config_array, mailbox_id) — 2 args
        // Our conditions are appended to the existing 'dates' group so they
        // appear alongside Waiting Since, Last User Reply, etc.
        // -----------------------------------------------------------------------
        \Eventy::addFilter('workflows.conditions_config', function (array $config, $mailbox_id): array {

            $config['dates']['items']['today_is_business_day'] = [
                'title'     => __('businessdays::messages.cond_today_is_business_day'),
                'operators' => [
                    'yes' => __('businessdays::messages.op_yes'),
                    'no'  => __('businessdays::messages.op_no'),
                ],
                'values'    => [],
                // No 'triggers' key → condition appears for all workflow trigger types
            ];

            $config['dates']['items']['business_days_since_last_reply'] = [
                'title'     => __('businessdays::messages.cond_business_days_since_reply'),
                'operators' => [
                    'greater_than' => __('businessdays::messages.op_greater_than'),
                    'less_than'    => __('businessdays::messages.op_less_than'),
                    'equal'        => __('businessdays::messages.op_equal'),
                ],
            ];

            $config['dates']['items']['business_days_waiting_since'] = [
                'title'     => __('businessdays::messages.cond_business_days_waiting_since'),
                'operators' => [
                    'greater_than' => __('businessdays::messages.op_greater_than'),
                    'less_than'    => __('businessdays::messages.op_less_than'),
                    'equal'        => __('businessdays::messages.op_equal'),
                ],
            ];

            return $config;
        }, 20, 2);

        // -----------------------------------------------------------------------
        // Hook 2: workflow.check_condition  (singular — verified from source)
        // Fired for every condition row during conversation processing.
        // Signature: filter(result, type, operator, value, conversation, workflow) — 6 args
        // Return $result unchanged for any type this module does not own.
        // -----------------------------------------------------------------------
        \Eventy::addFilter('workflow.check_condition', function ($result, $type, $operator, $value, $conversation, $workflow) {

            switch ($type) {

                case 'today_is_business_day':
                    $isBusinessDay = $this->isBusinessDay(Carbon::now());
                    // 'yes' → passes when today IS a business day
                    // 'no'  → passes when today is NOT a business day
                    return $operator === 'yes' ? $isBusinessDay : !$isBusinessDay;

                case 'business_days_since_last_reply':
                    $timestamp = $conversation->last_reply_at ?? $conversation->updated_at;
                    if (!$timestamp) {
                        return false;
                    }
                    $elapsed = $this->calcBusinessDays(
                        Carbon::parse($timestamp),
                        Carbon::now()
                    );
                    $days = (int) $value;
                    return match ($operator) {
                        'greater_than' => $elapsed > $days,
                        'less_than'    => $elapsed < $days,
                        'equal'        => $elapsed === $days,
                        default        => false,
                    };

                case 'business_days_waiting_since':
                    if ($conversation->last_reply_from !== \App\Conversation::PERSON_CUSTOMER) {
                        return false;
                    }
                    if (!in_array($conversation->status, [
                        \App\Conversation::STATUS_ACTIVE,
                        \App\Conversation::STATUS_PENDING,
                    ])) {
                        return false;
                    }
                    $timestamp = $conversation->last_reply_at ?? $conversation->updated_at;
                    if (!$timestamp) {
                        return false;
                    }
                    $elapsed = $this->calcBusinessDays(
                        Carbon::parse($timestamp),
                        Carbon::now()
                    );
                    $days = (int) $value;
                    return match ($operator) {
                        'greater_than' => $elapsed > $days,
                        'less_than'    => $elapsed < $days,
                        'equal'        => $elapsed === $days,
                        default        => false,
                    };

                default:
                    return $result;
            }

        }, 20, 6);
    }

    /**
     * Returns true when $date is a weekday AND is not listed in the
     * company_holidays config array.
     *
     * Uses Carbon::isWeekend() to exclude Saturday and Sunday, then
     * checks the Y-m-d string against config('businessdays.company_holidays').
     */
    protected function isBusinessDay(Carbon $date): bool
    {
        if ($date->isWeekend()) {
            return false;
        }

        $holidays = config('businessdays.company_holidays', []);

        return !in_array($date->toDateString(), $holidays, true);
    }

    /**
     * Count business days (Mon–Fri, excluding company holidays) between
     * two Carbon instances.
     *
     * Counting rule: $from is NOT counted; $to IS counted if it is a
     * business day. Returns 0 when $from >= $to.
     *
     * Example: from=Monday 09:00, to=Wednesday 14:00 → 2 (Tue + Wed).
     */
    protected function calcBusinessDays(Carbon $from, Carbon $to): int
    {
        if ($from->gte($to)) {
            return 0;
        }

        $count   = 0;
        $current = $from->copy()->addDay()->startOfDay();
        $end     = $to->copy()->startOfDay();

        while ($current->lte($end)) {
            if ($this->isBusinessDay($current)) {
                $count++;
            }
            $current->addDay();
        }

        return $count;
    }
}
