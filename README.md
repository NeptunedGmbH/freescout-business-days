# FreeScout — Business Days Module

A custom module for [FreeScout](https://freescout.net) that adds two new conditions to the **Workflows** module:

| Condition | Type | Description |
|---|---|---|
| **Today is a Business Day** | Boolean | Evaluates to true/false based on whether today is a weekday and not a configured company holiday |
| **Business Days Since Last Reply** | Numeric | Counts the number of business days elapsed since the last reply on a conversation |

Both conditions are powered by [Laravel Carbon](https://carbon.nesbot.com) and respect a configurable list of company holidays.

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

---

## How It Works

The module hooks into two Eventy filters exposed by the Workflows module:

| Hook | Purpose |
|---|---|
| `workflows.conditions_config` | Registers the conditions in the Workflow Builder UI (Dates group) |
| `workflow.check_condition` | Evaluates the condition logic at runtime per conversation |

The `isBusinessDay()` method checks `Carbon::isWeekend()` and then compares against the `company_holidays` config array. Both conditions share this method, so holiday exclusions apply consistently.

---

## License

MIT
