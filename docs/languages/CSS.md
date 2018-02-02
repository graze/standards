# CSS / Less

1. Words in file names MUST be separated with hyphens (-).
1. CSS3 is RECOMMENDED.
1. Selectors MUST be in hyphen case. (.button-blue).
1. Selectors MUST be on a single line, with a space after the last selector, followed by an opening brace. A selector
   MUST end with a closing brace that is un-indented and on a separate line. A blank line MUST be placed between each
   block of selectors.
1. There MUST only be one property:value pair per line.
1. CSS blocks SHOULD adhere to the CSS Property Order.
1. There MUST always be a space after a property's colon (e.g., display: block; and not display:block;).
1. Property declaration lines MUST end with a semi-colon.
1. For multiple, comma-separated selectors, each selector MUST be on its own line.
1. Attribute selectors, like input[type="text"] MUST always wrap the attribute's value in double quotes, for
   consistency and safety.
1. Attribute selectors MUST only be used where absolutely necessary (e.g., form controls) and MUST be avoided on custom
   components for performance and explicitness.
1. Series of classes for a component MUST include a base class (e.g., .component) and use the base class as a prefix
   for modifier and sub-components (e.g., .component-lg).
