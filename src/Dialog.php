<?php
namespace Dialog;

class Dialog
{
	const BUTTON_YES = 0;
	const BUTTON_OK = 0;
	const BUTTON_NO = 1;
	const BUTTON_CANCEL = 1;
	const BUTTON_HELP = 2;
	const BUTTON_EXTRA = 3;
	const BUTTON_ITEM_HELP = 4;
	const ESC_OR_ERROR = -1;

	protected $widget = null;
	protected $common = null;
	protected $exit_code = null;

    public function __construct(CommonOptions $common, Box $widget)
    {
		$this->common = $common;
		$this->widget = $widget;
    }

	public function getDialogOptionString(): string
	{
		$str = '';

		$str .= $this->common->parseCommonOptions($this->common->getCommonOptionsConfigured());

		$str .= " {$this->widget->getBoxOptionString()}";

		return $str;
	}

    public function run()
    {
		$args = $this->getDialogOptionString();
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
		$status = proc_get_status($p);
		$this->exit_code = $status['exitcode'];
        // Close all handles
        fclose ($pipes[2]);
        fclose ($out);
        fclose ($in);
        proc_close ($p);
        // Return result
        return $result;
    }

	public function getExitCode(): int
	{
		return $this->exit_code;
	}

}
