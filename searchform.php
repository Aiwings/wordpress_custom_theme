
 <?php  
  /**
   * Custom template pour la barre de recherche
   */
  ?>
  
  <label for="s">Rechercher:</label>   
<form id="searchform" method="get" action="portfolio/index.php">
    <div>
        <input type="text" name="s" id="s" />
        <button type="submit">
             <?php _portfolio_get_svg_icon("search"); ?>
        </button>
    </div>
</form>

