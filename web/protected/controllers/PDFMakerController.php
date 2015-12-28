<?php

//require 'fpdf/fpdf.php';
define('_MPDF_URI', Yii::app()->getBaseUrl(true) . '/mpdf/');
include 'mpdf/mpdf.php';


class PDFMakerController extends Controller
{
        private function Header()
        {
                $header = '';
                $header .= '<div style="font-family:Arial;color:#AAA;font-size:13pt;width:100%;text-align:right;"><img src="images/GIZ_LOGO.png" style="float:left;margin-left:-22px;"/><div style="padding-top:7px;">' . Yii::t('site', 'fullsitename') . '</div></div>';
                $header .= '<div style="clear:both;position:relative;"><hr style="margin:0;"/></div>';
                return $header;
        }
        
        private function Footer($year = null)
        {
            $footer = '';
            $footer .= '<div style="width:100%;text-align:center;font-family:Arial;color:#AAA;font-size:13pt;">' . Yii::t('reports', 'report_footer') . $year . '</div>';
            return $footer;
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
            $pdf->StartProgressBarOutput();
            
            $pdf->SetHTMLHeader($this->Header());
            $pdf->WriteHTML($html);
            $pdf->Output();
            exit;
        }
        
        public function actionReport($id)
        {
            $pdf = new mPDF('UTF-8','A4',12, 'Times',15,15,35,20,10,15);
            $pdf->SetHTMLHeader($this->Header());
            
            $model = new Reports();
            $report = $model->findByPk($id);
            
            $pdf->SetHTMLFooter($this->Footer($report->year));
            $countries = $this->getCountries($report->countries);
            $pdf->WriteHTML(PDF::PrintTitle(Yii::t('reports', 'report_title'), $report->year, $countries));
            $pdf->AddPage();
            $pdf->WriteHTML(PDF::PrintIntro($report->year, $countries));

            $pdf->SetHTMLFooter($this->Footer($report->year));
            $pdf->AddPage();
            
            $pdf->Output();
            $this->render('view', array('html' => $html));
        }

	public function actionView()
	{
		$this->render('view');
	}

        protected function getCountries($json_countries)
        {
            $result = '';
            $data = json_decode($json_countries);
            $countries = $this->GetArray('Country', 'id_country', 'name_' . Yii::app()->language);
            foreach ($data as $item)
            {
                $result .= $countries[$item] . ', ';
            }
            $result = trim($result,', ');
            return $result;
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