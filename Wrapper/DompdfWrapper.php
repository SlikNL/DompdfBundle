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
     * @param string $html        The html to be rendered
     * @param string $papersize   The size of the page to render, defaults to DOMPDF_DEFAULT_PAPER_SIZE
     * @param string $orientation The orientation of the page to render, defaults to DOMPDF_DEFAULT_ORIENTATION
     */
	public function getpdf($html, $papersize = null, $orientation = null)
	{
		// test if dompdf config exists in symfony app folder
		$testFilePath = "/../../../../../../app/dompdf_config.inc.php";
		if (file_exists(dirname(__FILE__).$testFilePath)) {
			require_once(dirname(__FILE__).$testFilePath);
		}
		else {
			require_once dirname(__FILE__).'/../DomPDF/dompdf_config.inc.php';
		}

        // Have to use contants here because they are undefined until required above
        $papersize = is_null($papersize) ? DOMPDF_DEFAULT_PAPER_SIZE : $papersize;
        $orientation = is_null($orientation) ? DOMPDF_DEFAULT_ORIENTATION : $orientation;

		$this->pdf = new \DOMPDF();

		$this->pdf->set_paper($papersize, $orientation);
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
