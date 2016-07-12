<?php

// basic if - else
if ($expr1) {
    // if body
} elseif ($expr2) {
    // elseif body
} else {
    // else body;
}

// if with a negation
if (!$expr1) {
    // if  body
}

// if with an operand
if ($expr1 && $expr2) {
    // if body
} else {
    // else body;
}

// if with long expression
if ($expr1 &&
    $expr2 &&
    $expr3 &&
    $expr4 &&) {
    // if  body
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
    // for body
}

// foreach loop
foreach ($iterable as $key => $value) {
    // foreach body
}

// try - catch
try {
    // try body
} catch (FirstExceptionType $e) {
    // catch body
} catch (OtherExceptionType $e) {
    // catch body
}
