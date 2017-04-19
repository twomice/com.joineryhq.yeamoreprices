# YEA More Fixed Price Options

Custom for YEA; increases to 15 the number of "Fixed Price Options" available in a Contribution Page.

## Installation and use
1. Install this extension
2. Observe that there are now 15 options under the "Fixed Price Options" section of the "Amounts" tab in any Contribution Page.
3. Observe that these 15 options behave the same as the normal 10 options in all ways, including  Contribution Page configuration and public-facing submission of new contributions.
4. Yay!

## Design decisions and limitations
As of CiviCRM 4.6 at least, there's no way to implement this behavior without completely replacing PHP classes and templates:

* The `CRM_Contribute_Form_ContributionPage_Amount` class limits the number of fields to 10, using a PHP class constant which is referenced repeatedly as `self::NUM_OPTION`. If this were a class variable (`$this->num_option`) or even if it were referenced as `static::NUM_OPTION`, it would be possible to extend this class and change the NUM_OPTION value via class inhertance. Unfortunately, the `self` keyword doesn't respect inheritance and will thus always use the hard-coded value.
* The template CRM/Contribute/Form/ContributionPage/Amount.tpl uses a hard-coded number to limit the number of fields to 10. If this were a template variable defined in the `CRM_Contribute_Form_ContributionPage_Amount` class, it would be possible to change that variable in an implementation of `hook_civicrm_buildForm` or otherwise from the extended child class of `CRM_Contribute_Form_ContributionPage_Amount` (see above bullet point). Unfortunately, since this is hard-coded, there's no choice but to override the entire template.

As explained in the comments at the top of each overridden PHP and template file, all changes to those files are marked with the string `MODIFIED.com.joineryhq.yeamoreprices`, to facilitate code review and comparison when upgrading CiviCRM, which is a required part of upgrades when file overrides are in use.
