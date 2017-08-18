<?php

// basic if - else
if ($expr1) {
    echo 'if body';
} elseif ($expr2) {
    echo 'elseif body';
} else {
    echo 'else body';
}

// if with a negation
if (!$expr1) {
    // if  body
    echo 'negative if body';
}

// if with an operand
if ($expr1 && $expr2) {
    echo 'if body';
} else {
    echo 'else body';
}

// if with long expression
if ($expr1
    && $expr2
    && $expr3
    && $expr4) {
    echo 'if body';
}

// switch statement
switch ($expr) {
    case 0:
        echo 'First case, with a break';
        break;
    case 1:
        echo 'Second case, which falls through';
        // no break
    case 2:
    case 3:
    case 4:
        echo 'Third case, return instead of break';
        return;
    default:
        echo 'Default case';
        break;
}

// for loop
for ($i = 0; $i < 10; $i++) {
    echo 'for body ' . $i;
}

// foreach loop
foreach ($iterable as $key => $value) {
    echo 'foreach body';
}

// try - catch
try {
    echo 'try body';
} catch (FirstExceptionType $e) {
    echo 'catch body';
} catch (OtherExceptionType $e) {
    echo 'other catch body';
}

// casting
$int = (int) $string;
