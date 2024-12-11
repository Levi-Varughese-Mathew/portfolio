 <!-- This is the modified code for easier understanding -->
                    <option value="<?php echo $unit; ?>" 
                        <?php echo ($From == $unit) ? 'selected' : '' ?>>
                            <?php echo $unit; ?>
                    </option>


                    <option value="<?php echo $unit ?>" <?= ($From == $unit) ? 'selected' : '' ?>""><?= $unit ?>
                            </option>
                    
                    
                    foreach ($units as $unit):
                    
                    <option value="
                        <?php echo $unit ?>" <?= ($To == $unit) ? 'selected' : '' ?>><?= $unit ?>
                    </option>