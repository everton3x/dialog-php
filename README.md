# Dialog for PHP

Dialog for PHP is a binding for the dialog (program to display dialog boxes from shell scripts) made in PHP.

## How to use

Dialog for PHP follows a relatively well-defined usage pattern:

#1 Instantiate common options;

#2 Create an instance of the widget with your specific options;

#3 Create the dialog instance;

#4 Execute the dialog; and

#5 Do something with the result.

## Setting Options

There are two ways to define the options for each dialog: in the instance of common options and the widget; Or at run time, after the instances of the option classes have been created.

### Options when creating Common and Box instances (specific options for each widget).

When creating a Common or Box instance, the options can be provided in an array of type option => value, where option corresponds to the desired option, exactly as it appears in the dialog documentation. For example, to define the --backtitle "My dialog example", the following key / value pair must be included in the array of options: backtitle => "My dialog example". To use the --extra-label "Button name" option, we use extra-label => "Button name"

### Options defined after the instance craze

You can also set options after you have created instances of classes, following the following format:

--backtitle = "My dialog example" -> $ obj-> backtitle = "My dialog example"

--extra-label "Button name" -> $ obj-> extra_label = "Button name"

## Important notes

- Options such as --extra-button or --nocancel should receive Boolean values ​​to activate them.

- The widget controls only require the required parameters according to the desired widget, except width and height that are always set to 0. To change width or height, use $ obj-> width and $ obj-> height.

- The --begin option originally receives two integers (y, x), but its assignment must be in the form of an array [y, x].

- Some widgets need specific options that are implemented through helper classes, such as --menu and --radiolist, for example.

- Due to the complexity of using --gauge, --mixedgauge and --progress, these widgets have an unusual form of use (see the examples for implementation and usage details).

- All widgets extend the Box class and adopt exactly the same name as the dialog option, but with the first capital letter, for example --buildlist becomes Buillist ().

## TO-DO

- Improve documentation

## Father of the child

Everton da Rosa

## License

This software is distributed through the MIT License.
