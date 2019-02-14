<?php ?>

<style>
     .add {
            padding: 50px;
        }
</style>
<div class="add" align="center">
    
    <h2>Add to List</h2>

 <form method = "post" action = "index.php">
            <div class="form-row">
              <div class="form-group col-md-3">
                <div class="form-group">
                  <label for="start_date">Common Name:</label>
                  <input type="text" class="form-control" id="common_name" name="common_name" value="<?php echo isset($_POST["common_name"]) ? $_POST["common_name"] : ''; ?>">
                </div>
                <div class="form-group">
                  <label for="start_date">Scientific Name:</label>
                  <input type="text" class="form-control" id="sci_name" name="sci_name" value="<?php echo isset($_POST["sci_name"]) ? $_POST["sci_name"] : ''; ?>">
                </div>  
                <div class="form-group">
                  <label for="start_date">Native or Non-native:</label>
                  <input type="text" class="form-control" id="type" name="type" value="<?php echo isset($_POST["type"]) ? $_POST["type"] : ''; ?>">
                </div>
              </div> 
            </div>
            <div class="form-row">
                <div class="form-group">
                    <input type="submit" value="add" class="btn btn-primary">
                </div>
            </div>
        </form>
</div>