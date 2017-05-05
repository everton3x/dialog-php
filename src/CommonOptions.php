<?php
namespace Dialog;

use ReflectionClass;
use ReflectionProperty;

class CommonOptions
{

	const BUTTON_NAME_OK = 'ok';
	const BUTTON_NAME_YES = 'yes';
	const BUTTON_NAME_CANCEL = 'cancel';
	const BUTTON_NAME_NO = 'no';
	const BUTTON_NAME_HELP = 'help';
	const BUTTON_NAME_EXTRA = 'extra';

    protected $option_ascii_lines = false;
    protected $option_aspect = false;
    protected $option_backtitle = false;
    protected $option_begin = false;
    protected $option_cancel_label = false;
    protected $option_clear = false;
    protected $option_colors = false;
    protected $option_column_separator = false;
    protected $option_cr_wrap = false;
    protected $option_create_rc = false;
    protected $option_date_format = false;
    protected $option_defaultno = false;
    protected $option_default_button = false;
    protected $option_default_item = false;
    protected $option_exit_label = false;
    protected $option_extra_button = false;
    protected $option_extra_label = false;
    protected $option_help = false;
    protected $option_help_button = false;
    protected $option_help_label = false;
    protected $option_help_status = false;
    protected $option_help_tags = false;
    protected $option_hfile = false;
    protected $option_hline = false;
    protected $option_ignore = false;
    protected $option_input_fd = false;
    protected $option_insecure = false;
    protected $option_iso_week = false;
    protected $option_item_help = false;
    protected $option_keep_tite = false;
    protected $option_keep_window = false;
    protected $option_last_key = false;
    protected $option_max_input = false;
    protected $option_no_cancel = false;
    protected $option_no_collapse = false;
    protected $option_no_items = false;
    protected $option_no_kill = false;
    protected $option_no_label = false;
    protected $option_no_lines = false;
    protected $option_no_mouse = false;
    protected $option_no_nl_expand = false;
    protected $option_no_ok = false;
    protected $option_no_shadow = false;
    protected $option_no_tags = false;
    protected $option_ok_label = false;
    protected $option_output_fd = false;
    protected $option_separator = false;
    protected $option_output_separator = false;
    protected $option_print_maxsize = false;
    protected $option_print_size = false;
    protected $option_print_version = false;
    protected $option_quoted = false;
    protected $option_scrollbar = false;
    protected $option_separate_output = false;
    protected $option_separate_widget = false;
    protected $option_shadow = false;
    protected $option_single_quoted = false;
    protected $option_size_err = false;
    protected $option_sleep = false;
    protected $option_stderr = false;
    protected $option_stdout = false;
    protected $option_tab_correct = false;
    protected $option_tab_len = false;
    protected $option_time_format = false;
    protected $option_timeout = false;
    protected $option_title = false;
    protected $option_trace = false;
    protected $option_week_start = false;
    protected $option_trim = false;
    protected $option_version = false;
    protected $option_visit_items = false;
    protected $option_yes_label = false;

    public function getCommonOptionsConfigured(): array
    {
        $options = [];

        $reflect = new ReflectionClass($this);
        $properties = $reflect->getProperties(ReflectionProperty::IS_PROTECTED);
        foreach($properties as $p) {
            $pname = $p->name;//return property name wihtout $

            if(substr($pname, 0, 7) === 'option_' && $this->{$pname} !== false) {
                $options[substr($pname, 7)] = $this->{$pname};
            }

        }

        return $options;
    }

    //converte as opções configuradas em string de opções do dialog
    public function parseCommonOptions(array $options): string
    {
        $str = '';

        foreach($options as $name => $value) {

			if($this->optionParseExists($name) === true) {
				$str_value = $this->callOptionValueParser($name, $value);
			}else{
				$str_value = $value;
			}

            $str .= " {$this->getOptionString($name, $str_value)}";
        }

        return $str;
    }

	protected function getOptionString(string $name, $value): string
	{
		$option = str_replace('_', '-', $name);

		if(is_bool($value)){
			return "--$option";
		}elseif(is_string($value)){
			$value = "'$value'";
		}elseif(is_array($value)){
			$value = join(' ', $value);
		}

		return "--$option $value";
	}

	protected function optionParseExists(string $option): bool
	{
		return method_exists('Dialog\Parser', "parse_value_for_$option");
	}

	protected function callOptionValueParser(string $option_name, $value): string
	{
		$parser = "Dialog\Parser::parse_value_for_$option_name";
		return $parser($value);
	}

	public function setBacktitle(string $backtitle): void
	{
		$this->option_backtitle = $backtitle;
		return;
	}

	public function setBegin(int $y, int $x): void
	{
		$this->option_begin = [$y, $x];
		return;
	}

	public function setCancelLabel(string $label): void
	{
		$this->option_cancel_label = $label;
		return;
	}

	public function setColumnSeparator(string $separator): void
	{
		$this->option_column_separator = $separator;
		return;
	}

	public function setClear(bool $value): void
	{
		$this->option_clear = $value;
	}

	public function setCrWrap(bool $value): void
	{
		$this->option_cr_wrap = $value;
	}

	public function setDateFormat(string $format): void
	{
		$this->option_date_format = $format;
		return;
	}

	public function setDefaultno(bool $value): void
	{
		$this->option_defaultno = $value;
		return;
	}

	public function setDefaultButton(string $button): void
	{
		$this->option_default_button = $button;
		return;
	}

	public function setDefaultItem(string $item): void
	{
		$this->option_default_item = $item;
		return;
	}

	public function setExitLabel(string $label): void
	{
		$this->option_exit_label = $label;
		return;
	}

	public function setExtraButton(bool $value, string $label = null): void
	{
		$this->option_extra_button = $value;
		if(!is_null($label)){
			$this->setExtraLabel($label);
		}
		return;
	}

	public function setExtraLabel(string $label): void
	{
		$this->option_extra_label = $label;
		return;
	}

	public function setHelp(bool $value): void
	{
		$this->option_help = $value;
		return;
	}

	public function setHelpButton(bool $value): void
	{
		$this->option_help_button = $value;
		return;
	}

	public function setHelpLabel(string $label): void
	{
		$this->option_help_label = $label;
		return;
	}

	public function setHline(string $value): void
	{
		$this->option_hline = $value;
		return;
	}

	public function setIgnore(bool $value): void
	{
		$this->option_ignore = $value;
		return;
	}

	public function setInsecure(bool $value): void
	{
		$this->option_insecure = $value;
		return;
	}

	public function setKeepTite(bool $value): void
	{
		$this->option_keep_tite = $value;
		return;
	}

	public function setKeepWindow(bool $value): void
	{
		$this->option_keep_window = $value;
		return;
	}

	public function setMaxInput(int $max): void
	{
		$this->option_max_input = $max;
		return;
	}

	public function setNoCancel(bool $value): void
	{
		$this->option_no_cancel = $value;
		return;
	}

	public function setNoCollapse(bool $value): void
	{
		$this->option_no_collapse = $value;
		return;
	}

	public function setNoItems(bool $value): void
	{
		$this->option_no_items = $value;
		return;
	}

	public function setNoKill(bool $value): void
	{
		$this->option_no_kill = $value;
		return;
	}

	public function setNoLabel(string $label): void
	{
		$this->option_no_label = $label;
		return;
	}

	public function setNoLines(bool $value): void
	{
		$this->option_no_lines = $value;
		return;
	}

	public function setNoMouse(bool $value): void
	{
		$this->option_no_mouse = $value;
		return;
	}

	public function setNoNlExpand(bool $value): void
	{
		$this->option_no_nl_expand = $value;
		return;
	}

	public function setNoOk(bool $value): void
	{
		$this->option_no_ok = $value;
		return;
	}

	public function setNoShadow(bool $value): void
	{
		$this->option_no_shadow = $value;
		return;
	}

	public function setNoTags(bool $value): void
	{
		$this->option_no_tags = $value;
		return;
	}

	public function setOkLabel(string $label): void
	{
		$this->option_ok_label = $label;
		return;
	}

	public function setSeparator(string $separator): void
	{
		$this->option_separator = $separator;
		return;
	}

	public function setOutputSeparator(string $separator): void
	{
		$this->option_output_separator = $separator;
		return;
	}

	public function setPrintMaxsize(bool $value): void
	{
		$this->option_print_maxsize = $value;
		return;
	}

	public function setPrintSize(bool $value): void
	{
		$this->option_print_size = $value;
		return;
	}

	public function setPrintVersion(bool $value): void
	{
		$this->option_print_version = $value;
		return;
	}

	public function setQuoted(bool $value): void
	{
		$this->option_quoted = $value;
		return;
	}

	public function setScrollbar(bool $value): void
	{
		$this->option_scrollbar = $value;
		return;
	}

	public function setSeparateOutput(bool $value): void
	{
		$this->option_separate_output = $value;
		return;
	}

	public function setSeparateWidget(bool $value): void
	{
		$this->option_separate_widget = $value;
		return;
	}

	public function setShadow(bool $value): void
	{
		$this->option_shadow = $value;
		return;
	}

	public function setSingleQuoted(bool $value): void
	{
		$this->option_single_quoted = $value;
		return;
	}

	public function setSizeErr(bool $value): void
	{
		$this->option_size_err = $value;
		return;
	}

	public function setSleep(int $seconds): void
	{
		$this->option_sleep = $seconds;
		return;
	}

	public function setStdErr(bool $value): void
	{
		$this->option_stderr = $value;
		return;
	}

	public function setStdOut(bool $value): void
	{
		$this->option_stdout = $value;
		return;
	}

	public function setTabCorrect(bool $value): void
	{
		$this->option_tab_correct = $value;
		return;
	}

	public function setTabLen(int $len): void
	{
		$this->option_tab_len = $len;
		return;
	}

	public function setTimeFormat(string $format): void
	{
		$this->option_time_format = $format;
		return;
	}

	public function setTimeOut(int $seconds): void
	{
		$this->option_timeout = $seconds;
		return;
	}

	public function setTitle(string $title): void
	{
		$this->option_title = $title;
		return;
	}

	public function setTrim(bool $value): void
	{
		$this->option_trim = $value;
		return;
	}

	public function setVersion(bool $value): void
	{
		$this->option_version = $value;
		return;
	}

	public function setVisitItems(bool $value): void
	{
		$this->option_visit_items = $value;
		return;
	}

	public function setYesLabel(string $label): void
	{
		$this->option_yes_label = $label;
		return;
	}
}
