<?php
/**
 * Plugin Name:       my_personal_Calculator
 * Plugin URI:        https://wptownhall.com
 * Description:       Add a custom calculator to Dashboard
 * Version:           1.0
 * Author:            Naymul Hasan Tanvir
 * Author URI:        https://wptownhall.com
 * Text Domain:       My-personal-calculator plugin
 */
wp_enqueue_script( 'myjs',plugin_dir_url('/my.js'),array('jQuery'),time(),true);
 function tanvir_custom_menu(){
    add_menu_page('calculator','Just do calculate','manage_options','tanvir_admin_menu','tanvir_admin_menu_main'," dashicons-calculator",5);
 }


function tanvir_admin_menu_main(){
    // If the submit button has been pressed
    if(isset($_POST['submit']))
    {
    // Check number values
    if(is_numeric($_POST['number1']) && is_numeric($_POST['number2']))
    {
    // Calculate total
    if($_POST['operation'] == 'plus')
    {
    $total = $_POST['number1'] + $_POST['number2']; 
    }
    if($_POST['operation'] == 'minus')
    {
    $total = $_POST['number1'] - $_POST['number2']; 
    }
    if($_POST['operation'] == 'multiply')
    {
    $total = $_POST['number1'] * $_POST['number2']; 
    }
    if($_POST['operation'] == 'divided by')
    {
    $total = $_POST['number1'] / $_POST['number2']; 
    }
    if($_POST['operation'] == 'Modulus')
    {
    $total = $_POST['number1'] % $_POST['number2']; 
    }
    
    // Print total to the browser
    echo "<h1>{$_POST['number1']} {$_POST['operation']} {$_POST['number2']} equals {$total}</h1>";
    
    } else {
    
    // Print error message to the browser
    echo 'Numeric values are required';
    
    }
    }
    // end PHP
    ?>
        <form method="post" style="margin-top:100px;">
         <input name="number1" type="text" class="form-control" style="width: 150px; display: inline" />
         <select name="operation">
          <option value="plus">Plus</option>
             <option value="minus">Minus</option>
             <option value="multiply">Multiply</option>
             <option value="divided by">Devide</option>
             <option value="Modulus">modulus</option>
         </select>
         <input name="number2" type="text" class="form-control" style="width: 150px; display: inline" />
         <input name="submit" type="submit" value="Calculate" class="btn btn-primary" />
     </form>
   
    <?php
}

add_action( 'admin_menu','tanvir_custom_menu' );