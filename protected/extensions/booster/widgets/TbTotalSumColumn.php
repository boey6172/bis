<?php
/**
 *## TbTotalSumColumn class file
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * @copyright Copyright &copy; Clevertech 2012-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */

Yii::import('booster.widgets.TbDataColumn');

/**
 *## TbTotalSumColumn widget class
 *
 * @package booster.widgets.grids.columns
 */
class TbTotalSumColumn extends TbDataColumn
{
	public $totalExpression;

	public $totalValue;

	protected $total = 0;

	public function init()
	{
		parent::init();

		if (!is_null($this->totalExpression)) {
			$this->total = is_numeric($this->totalExpression)
				? $this->totalExpression
				: $this->evaluateExpression(
					$this->totalExpression
				);
		}
		$this->footer = true;
	}

	protected function renderDataCellContent($row, $data)
	{
		ob_start();
		parent::renderDataCellContent($row, $data);
		$value = ob_get_clean();

		if (is_numeric($value)) {
			$this->total += $value;
			$value = Yii::app()->numberFormatter->formatCurrency($value, "PHP");
		}
		
		echo $value;
	}

	protected function renderFooterCellContent()
	{
		if (is_null($this->total)) {
			parent::renderFooterCellContent();
		}

		 echo $this->totalValue ? $this->evaluateExpression($this->totalValue, array('total' => $this->total))
			: Yii::app()->numberFormatter->formatCurrency($this->total, "PHP");
	}
}
