<?php
class Page_Model extends TinyMVC_Model
{
  function get_title()
  {
    return 'Hello';
  }
  function get_body_text()
  {
    return 'Hello World.';
  }
  
  function getsites()
  {
  	    $this->db->query('select * from site');
    while($row = $this->db->next())
      $results[] = $row;
    return $results;
  }
}
?>