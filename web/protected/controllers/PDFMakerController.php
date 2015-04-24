<?php

//require 'fpdf/fpdf.php';
include 'mpdf/mpdf.php';

class PDFMakerController extends Controller
{
        private function Header()
        {
                $header = '<table><tr style="border-bottom:#AAA solid 2px;"><td style="padding:0;width:111px"><img src="images/GIZ_LOGO.png" style="float:left;margin-left:-22px;"/></td>';
                $header .= '<td style="vertical-align:bottom;padding-bottom:10px;padding-left:-32px;"><span style="font-family:Times;color:#AAA;font-size:13pt;">' . Yii::t('site', 'fullsitename') . '</span></td></tr></table>';
                $header .= '<div style="clear:both;position:relative;"><hr style="margin:0;"/></div>';
                return $header;
        }
    
	public function actionGenerate($id_survey_in_university = null, $date_till = null, $university_name = null)
	{
                $codeModel = new Code();
                $codeModel->survey_in_university_id = $id_survey_in_university;
                $codeModel->completed = null;
                $dataProvider = $codeModel->search();
                $sortCodes = new CSort();
                $sortCodes->defaultOrder = 'person_type_id, person_involved, id_code';
                $dataProvider->sort = $sortCodes;
                $pagesCodes = new CPagination();
                $pagesCodes->pageSize = $dataProvider->totalItemCount+1;
                $dataProvider->pagination = $pagesCodes;
                
                $html = PDF::PrintCodes($dataProvider, $university_name, $date_till);
                
                $pdf = new mPDF('UTF-8','A4',12, 'Times',15,15,25,15,5,9);
                $pdf->SetHTMLHeader($this->Header());
                $pdf->WriteHTML($html);
                $pdf->Output();
                exit;
        }

	public function actionView()
	{
		$this->render('view');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}