<?php

class Doc_model extends MY_Model
{
  public function getSetting($id)
  {
    $this->db->where('identifier',$id);
    return $this->db->get('doc_settings')->row()->html;
  }

  public function getCategories()
  {
    $sql="SELECT
    doc_categories.id,
    doc_categories.title,
    doc_categories.icon,
    doc_categories.intro,
    doc_colors.color,
    doc_categories.link
    FROM
    doc_colors
    INNER JOIN doc_categories ON doc_categories.color = doc_colors.id";
    return $this->db->query($sql)->result();
  }
}
