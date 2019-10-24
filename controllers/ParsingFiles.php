<?php
namespace controllers;
use models;



Class ParsingFiles
{
    public function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    public function parsingFileService()
    {
        $file=file_get_contents($_SERVER["DOCUMENT_ROOT"].'/files/services.xml');
        $category=explode('<Category>',$file);
        $categoryCount=substr_count($file,'<Category>');
        for($i=0;$i<=$categoryCount;$i++)
        {
            $name=$this->get_string_between($category[$i],'<Name>','</Name>');
            $description=$this->get_string_between($category[$i],'<Description>','</Description>');
            $categoryKey=$this->get_string_between($category[$i],'<CategoryKey>','</CategoryKey>');
            $subcategorycount=substr_count($category[$i],'<SubCategory>');
            $subcategory=explode('<SubCategory>',$category[$i]);

          $categories=new models\Category();
          $categories->create($name,$description,$categoryKey);
           $getlastid=$categories->getLastId();
            if($subcategorycount!=0)
            {
                for($k=1;$k<=$subcategorycount;$k++)
                {

                    $subcagoteryname=$this->get_string_between($subcategory[$k],'<Name>','</Name>');
                    $description=$this->get_string_between($subcategory[$k],'<Description>','</Description>');
                    $subCategoryKey=$this->get_string_between($subcategory[$k],'<SubCategoryKey>','</SubCategoryKey>');
                    $serviceId=$this->get_string_between($subcategory[$k],'<ServiceId>','</ServiceId>');
                    $ServiceKey=$this->get_string_between($subcategory[$k],'<ServiceKey>','</ServiceKey>');
                    $AmountMin=$this->get_string_between($subcategory[$k],'<Amount.Min>','</Amount.Min>');
                    $AmountMax=$this->get_string_between($subcategory[$k],'<Amount.Max>','</Amount.Max>');
                    $services=$this->get_string_between($subcategory[$k],'<Services>','</Services>');
                    $servicename=$this->get_string_between($services,'<Name>','</Name>');
                    $servicedesciprion=$this->get_string_between($services,'<Description>','</Description>');
                    $template=$this->get_string_between($services,'<Template>','</Template>');
                    $fields=$this->get_string_between($services,'<Fields>','</Fields>');
                    $fieldsname=$this->get_string_between($fields,'<Name>','</Name>');
                    $fieldshint=$this->get_string_between($subcategory[$k],'<Hint>','</Hint>');
                    $fieldsheading=$this->get_string_between($subcategory[$k],'<Heading>','</Heading>');
                    $fieldformat=$this->get_string_between($subcategory[$k],'<Format>','</Format>');
                    $fieldindex=$this->get_string_between($subcategory[$k],'<Index>','</Index>');
                    $fieldmin=$this->get_string_between($subcategory[$k],'<Min>','</Min>');
                    $fieldmax=$this->get_string_between($subcategory[$k],'<Max>','</Max>');

                    $subcategories=new models\Subcategory();
                    $subcategories->create($subcagoteryname,$description,$subCategoryKey,$getlastid);
                    $categorylastid=$subcategories->getLastId();
                    $servicess=new models\Service();
                    $servicess->create($serviceId,$ServiceKey,$AmountMin,$AmountMax,$servicename,$servicedesciprion,$template,$categorylastid);



                    $fieldss=new models\Fields();
                    $fieldss->create($fieldsname,$fieldshint,$fieldsheading,$fieldformat,$fieldindex,$fieldmin,$fieldmax,$serviceId);
                }

            }

        }

    }


    public function parsingCommision()
    {
        $file=file_get_contents($_SERVER["DOCUMENT_ROOT"].'/files/commissions.xml');
        $commisions=explode('<Commission',$file);
        $commisionsCount=substr_count($file,'<Commission');
        for($i=1;$i<=$commisionsCount;$i++)
        {
            $serviceId=$this->get_string_between($commisions[$i],'serviceId="','">');
            $res=$this->get_string_between($commisions[$i],'<ClientCommission ','</ClientCommissions>');
           $amountFrom=$this->get_string_between($res,'amountFrom="','"');
           $amountTo=$this->get_string_between($res,'amountTo="','"');
            $commissionId=$this->get_string_between($res,'commissionId="','"');
            $dateFrom=$this->get_string_between($res,'dateFrom="','"');
            $dateTo=$this->get_string_between($res,'dateTo="','"');
            $fixed=$this->get_string_between($res,'fixed="','"');
            $max=$this->get_string_between($res,'max="','"');
            $min=$this->get_string_between($res,'min="','"');
            $percent=$this->get_string_between($res,'percent="','"');
            $priority=$this->get_string_between($res,'priority="','"');
            $timeFrom=$this->get_string_between($res,'timeFrom="','"');
            $timeTo=$this->get_string_between($res,'timeTo="','"');

            $comissionsss=new models\Comission();
            $comissionsss->create($amountFrom,$amountTo,$commissionId,$dateFrom,$dateTo,$fixed,$max,$min,$percent,$priority,$timeFrom,$timeTo,$serviceId);

        }

    }
}




?>