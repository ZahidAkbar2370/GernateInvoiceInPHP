
<?php
require('fpdf184/fpdf.php');

//include('partial/session_start.php');
// 
// this code for query and make dynamic
// 
// $sql = ("SELECT id,Welcome_Mail,Trading_Guidence_Mail, Costumer_ID, DATE_FORMAT( SaleDate,  '%d-%m-%Y' ) AS SaleDateIND, Full_Name,Compliance_Status, PPI_Credits, compliance_officer_verification,  Email_ID, Mobile_No, Pan_Number, Approval_Status, PackageName,  DATE_FORMAT( Activation_Date,  '%d-%m-%Y' ) AS ActivationDate ,
        
//         DATE_FORMAT( Exp_Date,  '%d-%m-%Y' ) AS ExpDate , case when Exp_Date< NOW() then 'Expired' else 'Active' end as Status , Remark, Paid_Amout,  Company_Amount, Tax_Amount, PaymentMode, Agent_1, Agent_1_Percentange, Agent_1_Shared_Amount,Agent_2, Agent_2_Percentange,
        
//             Agent_2_Shared_Amount,Agent_3, Agent_3_Percentange,
        
//             Agent_3_Shared_Amount,
        
//         Date_of_Birth, KYC, Risk_Score, Risk_Level, DATE_FORMAT( DateTime,  '%d-%m-%Y %h %i' ) AS DateTimeConvert  FROM Customer_profile where  Costumer_ID= '53302' ORDER BY  `Id` DESC LIMIT 50");
    
//     $result = mysqli_query($connect,$sql);
//     $row = $result->fetch_assoc();
    

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )
$logo = "download.jpg";

$pdf->Image($logo,10,4,15);
$pdf->Cell(20	,5,'',0,0);
$pdf->Cell(130	,5,'Optionmaster Research',0,0);
$pdf->SetFont('Arial','',14);
$pdf->SetTextColor(255,140,0); 
$pdf->Cell(59	,5,'INVOICE',0,1);
$pdf->SetTextColor(0,0,0); 
//end of line

$pdf->Cell(195	,5,'',0,1);
$pdf->Cell(195	,0,'',1,1);
$pdf->Cell(195	,5,'',0,1);

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',10);

$pdf->Cell(130	,5,'Date: 2022-APRIL-18',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(100	,5,'Invoice Number:'."500276",0,0);
$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor(255,140,0); 
$pdf->Cell(25	,5,'OPTIONMASTER RESEARCH',0,1);
$pdf->SetTextColor(0,0,0); 
$pdf->SetFont('Arial','',10);
// $pdf->Cell(34	,5,'[dd/mm/yyyy]',0,1);//end of line

$pdf->Cell(130	,5,'Package Details: 12312312',0,0);
$pdf->Cell(25	,5,'',0,1);

$pdf->Cell(120	,5,'OPTIONS DIAMOND',0,0);
$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor(255,140,0); 
$pdf->Cell(25	,5,'ADVISOR SERVICES',0,1);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0); 
$pdf->Cell(34	,5,"c123231321",0,1);//end of line

//make a dummy empty cell as a vertical spacer
// $pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->SetFont('Arial','B',11);
$pdf->Cell(100	,5,'Customer details',0,1);//end of line
$pdf->SetFont('Arial','',10);
//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,"Name: Biswanath prusty",0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,"Phone: 7008321123",0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,"GST: 27AOXPP8950P1ZI",0,1);


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,6,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(25	,5,'Sr. No',1,0);
$pdf->Cell(40	,5,'Payment Date',1,0);
$pdf->Cell(34	,5,'Payment Mode',1,0);//end of line
$pdf->Cell(34	,5,'Paid Amount',1,0);//end of line
$pdf->Cell(30	,5,'Tax',1,0);//end of line
$pdf->Cell(30	,5,'Conv fee',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

//items
// $query=mysqli_query($con,"select * from item where invoiceID = '".$invoice['invoiceID']."'");
$tax=0;
$amount=0;
// while($item=mysqli_fetch_array($query)){
	for($i= 0; $i<18; $i++){
	$pdf->Cell(25	,7,$i,0,0,'C');
	$pdf->Cell(40	,7,"0".$i."/04/2022",0,0,'C');
	if($i == 1 ||$i == 4 || $i == 7 || $i == 9){
		$pdf->Cell(34	,7,"online",0,0,'C');
	}
	else{
		$pdf->Cell(34	,7,"cash",0,0,'C');
	}
	$pdf->Cell(34	,7,rand(),0,0,'C');
	$pdf->Cell(30	,7,$i*4,0,0,'C');
	$pdf->Cell(30	,7,"00",0,1,'C');
}//end of line
// }

$pdf->Cell(195	,5,'',0,1);
$pdf->Cell(195	,0,'',1,1);
$pdf->Cell(195	,3,'',0,1);
//summary
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(30	,5,'Gross Amount',0,0);
// $pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,number_format(58220),1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(30	,5,'GST 18%',0,0);
// $pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,'12780',1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(30	,5,'Conv fee',0,0);
// $pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,number_format(0),1,1,'R');//end of line

$pdf->Cell(40	,10,"",0,1);
$pdf->Cell(35	,5,'',0,0);



$pdf->SetFont('Arial','B',19);
$pdf->Cell(60	,5,'Thank You!',0,0);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(30	,5,'GRAND TOTAL',0,1);
$pdf->Cell(100	,5,'',0,0);
$pdf->Cell(100	,5,'170000',0,1);


$pdf->Cell(40	,6,"",0,1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(30	,5,'Notice:',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60	,5,'The amount once paid is not refundable. Trading in stock market is a risky activity.
',0,1);
$pdf->Cell(30	,5,'',0,0);
$pdf->Cell(60	,5,'Please read our Terms and Conditions from time to time.
',0,1);

$pdf->Cell(195	,3,'',0,1);
$pdf->Cell(195	,0,'',1,1);
$pdf->Cell(195	,4,'',0,1);

$pdf->Cell(50	,3,'',0,0);
$pdf->Cell(60	,3,'The Receipt is computerized hence does not required signature',0,1);

$pdf->Output();
?>
