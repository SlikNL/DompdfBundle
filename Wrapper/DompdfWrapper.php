<?php

namespace Slik\DompdfBundle\Wrapper;

use Slik\DompdfBundle\DomPDF;

/**
 * A wrapper class for DOMPDF to render pdfs from Symfony
 *
 * @author Christian Vermeulen <chris@slik.eu>
 */
class DompdfWrapper
{

	public $pdf;

	/**
	 * Render a pdf document
	 * @param  string $html    The html to be rendered
	 * @param  string $docname The name of the document to be served
	 */
	public function getpdf($html)
	{
		// test if dompdf config exists in symfony app folder
		$testFilePath = "/../../../../../../app/dompdf_config.inc.php";
		if (file_exists(dirname(__FILE__).$testFilePath)) {
			require_once(dirname(__FILE__).$testFilePath);
		}
		else {
			require_once dirname(__FILE__).'/../DomPDF/dompdf_config.inc.php';
		}

		$this->pdf = new \DOMPDF();

		$this->pdf->set_paper(DOMPDF_DEFAULT_PAPER_SIZE);
		$this->pdf->load_html($html);
		$this->pdf->render();
	}

	/**
	 * Stream the pdf document
	 * @param  string $docname The name of the document
	 */
	public function stream($docname)
	{
		$this->pdf->stream($docname);
	}

	/**
	 * get the raw pdf output
	 */
	public function output()
	{
		return $this->pdf->output();
	}
}
