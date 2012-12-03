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
	public function getpdf($html, $docname)
	{
		require_once dirname(__FILE__).'/../DomPDF/dompdf_config.inc.php';

		$pdf = new \DOMPDF();
		var_dump(get_class($pdf));
		$pdf->load_html($html);
		$pdf->render();
		$pdf->stream($docname);
	}
}
