<?php
namespace Dialog;

class DialogGroup
{
	protected $dialogs = [];

	public function __construct(Dialog ...$dialogs)
	{
		$this->dialogs = $dialogs;
	}

	protected function getDialogGrouptOptionString(): string
	{
		$str = '';
		$first = array_shift($this->dialogs);
		$str .= $first->getDialogOptionString();
		foreach ($this->dialogs as $d) {
			$str .= " --and-widget {$d->getDialogOptionString()}";
		}

		return $str;
	}

	public function run(): string
	{
		$args = $this->getDialogGrouptOptionString();
		// exit($args.PHP_EOL);
        // Adapted from https://stackoverflow.com/questions/4711904/using-linux-dialog-command-from-php/8738422#8738422
        $pipes = array (NULL, NULL, NULL);
        // Allow user to interact with dialog
        $in = fopen ('php://stdin', 'r');
        $out = fopen ('php://stdout', 'w');
        // But tell PHP to redirect stderr so we can read it
        $p = proc_open ('dialog '.$args, array (
            0 => $in,
            1 => $out,
            2 => array ('pipe', 'w')
        ), $pipes);
        // Wait for and read result
        $result = stream_get_contents ($pipes[2]);
        // Close all handles
        fclose ($pipes[2]);
        fclose ($out);
        fclose ($in);
        proc_close ($p);
        // Return result
        return $result;
	}
}
