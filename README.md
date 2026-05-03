# FreeScout — Business Days Module

A custom module for [FreeScout](https://freescout.net) that adds four new conditions to the **Workflows** module:

| Condition | Type | Description |
|---|---|---|
| **Today is a Business Day** | Boolean | Evaluates to true/false based on whether today is a weekday and not a configured company holiday |
| **Business Days Since Last Reply** | Numeric | Counts the number of business days elapsed since the last reply on a conversation (any party) |
| **Business Days Waiting Since Last Customer Reply** | Numeric | Counts business days since the last customer reply; only fires when the conversation is Active or Pending and the most recent reply came from a customer |
| **Business Days Since Last Agent Reply** | Numeric | Counts business days since the last agent reply; only fires when the most recent reply in the conversation was from an agent |

All conditions are powered by [Laravel Carbon](https://carbon.nesbot.com) and respect a configurable list of company holidays.

---

## Requirements

- FreeScout (any recent version)
- [Workflows module](https://freescout.net/module/workflows/) (official, paid) ≥ 1.0.0
- PHP ≥ 7.4

---

## Installation

### Via Docker

```bash
# Copy the module folder into your running FreeScout container
docker cp ./BusinessDays freescout-app:/www/html/Modules/BusinessDays

# Clear caches
docker exec freescout-app php /www/html/artisan cache:clear
docker exec freescout-app php /www/html/artisan config:clear
```

### Manual

Copy the `BusinessDays/` folder into the `/Modules/` directory of your FreeScout installation, then clear the application cache.

After installation, go to **Manage → Modules** and activate **Business Days**.

---

## Configuration

Edit `Config/config.php` to define your company holidays. Dates must be in `Y-m-d` format and match the timezone of your FreeScout server.

```php
'company_holidays' => [
    '2026-01-01', // New Year's Day
    '2026-04-03', // Good Friday
    '2026-05-01', // Labour Day
    '2026-12-25', // Christmas Day
    '2026-12-26', // Boxing Day
],
```

After editing, clear the config cache:

```bash
php artisan config:clear
# or in Docker:
docker exec freescout-app php /www/html/artisan config:clear
```

---

## Usage

### Today is a Business Day

Add this condition to any workflow. Choose operator **Yes** to match business days only, or **No** to match weekends and holidays.

Example use case: only send an auto-reply if a ticket arrives on a working day.

### Business Days Since Last Reply

Add this condition with an operator (`Is greater than`, `Is less than`, `Is equal to`) and a number.

Example use case: escalate a ticket if it has been waiting for more than 3 business days without a reply.

### Business Days Waiting Since Last Customer Reply

Add this condition with an operator and a number. It only evaluates (i.e. can pass) when:

- The most recent reply was written by the **customer** (not an agent), and
- The conversation status is **Active** or **Pending**.

If either guard fails the condition returns false, so it is safe to combine with other checks without needing extra status filters.

Example use case: automatically follow up or escalate a ticket that has been waiting on an agent response for more than 2 business days after the customer last wrote in.

### Business Days Since Last Agent Reply

Add this condition with an operator and a number. It only evaluates (i.e. can pass) when:

- The most recent reply in the conversation was written by an **agent** (not a customer).

If the last reply was from a customer the condition returns false, keeping it safe to use alongside other filters.

Example use case: remind or re-assign a ticket when an agent replied more than 5 business days ago and no customer response has arrived yet.

---

## How It Works

The module hooks into two Eventy filters exposed by the Workflows module:

| Hook | Purpose |
|---|---|
| `workflows.conditions_config` | Registers the conditions in the Workflow Builder UI (Dates group) |
| `workflow.check_condition` | Evaluates the condition logic at runtime per conversation |

The `isBusinessDay()` method checks `Carbon::isWeekend()` and then compares against the `company_holidays` config array. All three conditions share this helper, so holiday exclusions apply consistently.

The `calcBusinessDays($from, $to)` helper iterates day-by-day from `$from` (exclusive) to `$to` (inclusive) and counts only business days. All three numeric conditions (`Business Days Since Last Reply`, `Business Days Waiting Since Last Customer Reply`, and `Business Days Since Last Agent Reply`) use this helper.

---

## License

MIT
