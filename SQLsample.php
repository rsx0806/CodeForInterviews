<?php 
function getAll($params)
    {
        $output = [];
        $status = "!=";
        if(isset($params['city']) && $params['city'] != ""){
            $status = "=";
        }
        $subdiv = "17";
        if(isset($params['podr']) && $params['podr'] != ""){
            $status = "=";
            switch ($params['podr']) {
                case 'grt':
                    $subdiv = '26';
                    break;
                case 'mk':
                    $subdiv = '24';
                    break;
                default:
                    $subdiv = '17';
                    break;
            }
        }
        $sql = "select 
        -db_name-.-param-,-db_name-.-param-,-db_name-.-param-, -db_name-.-param-, -db_name-.-param-
        from -db_name-
        left join -db_name- on -db_name-.-param- = -db_name-.-param-
        left join -db_name- on -db_name-.-param- = -db_name-.-param-
        left join -db_name- on -db_name-.-param- = -db_name-.-param-
        left join -db_name- on -db_name-.-param- = -db_name-.-param-
        where -db_name-.id in ( 
        select id from -db_name-
             left join -db_name- on -db_name-.-param- = -db_name-.id and -db_name-.-param- = 31 where
             -param- = false and -db_name-.-param- = true
        )
        and -db_name-.-param- ".$status.$subdiv." group by -db_name-.-param- order by -db_name-.-param-;";
        $recordset = $this->con->query($sql);
        while ($record = $recordset->fetch())
        {
            $output[] = $record;
        }
        return $output;
    }
?>
