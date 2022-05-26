 <h2>Liste des commentaires</h2>
 <div class="table-responsive">
     <table class="table table-striped table-sm">
         <thead>
             <tr>
                 <th>Nom</th>
                 <th>Feedback</th>
                 <th>Actions</th>
             </tr>
         </thead>
         <tbody>
             <tr>
                 <td colspan="3" align="center">
                     <?php if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        } ?>
                 </td>
             </tr>
             <?php
                while ($com = $reqcomment->fetch()) { ?>
             <tr>
                 <td><?php echo $com['nom']; ?></td>
                 <td><?php echo $com['feedback']; ?></td>
                 <td>
                     <a href="../../myhost/actions/deletecomment.php?id=<?php echo $com['id']; ?>"
                         class="btn btn-danger">Delete</a>
                 </td>
             </tr>
             <?php }
                ?>
             <tr>
                 <td colspan="3" align="center" id="btnMoreComment"><a
                         href="../../pages/manage-comments/morecomment.php" class="btn btn-outline-secondary">Show
                         more</a></td>
             </tr>
         </tbody>
     </table>
 </div>