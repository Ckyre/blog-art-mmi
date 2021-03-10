<?php

namespace App\Controllers;

class ElementController extends Controller
{

   public function footer()
   {
      return $this->view('element.footer');
   }

   public function cgu()
   {
      return $this->view('element.cgu');
   }
   
   public function contact()
   {
      return $this->view('element.contact');
   }

   public function reseaux()
   {
      return $this->view('element.reseaux');
   }
}
