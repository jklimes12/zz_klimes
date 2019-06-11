
<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "header.php" ?>
      <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="mt-4 h2">drivers</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            This week
          </button>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>id player</th>
              <th>firsname</th>
              <th>lastname</th>
              <th>birtdate</th>
              <th>goal</th>
            </tr>
          </thead>
          <?php

          $idplayer = filter_input(INPUT_GET, "id_player");
          $sql = $mysqli->prepare("SELECT*  FROM player
                                   WHERE id_player = ?");
          $sql->bind_param("d", $idplayer);
          $sql->execute();
          $result = $sql->get_result();
                      while ($all = $result->fetch_assoc()) {

                        $dateOfBirth = $all["birtdate"];
                        $today = date("Y-m-d");
                        $diff = date_diff(date_create($dateOfBirth), date_create($today));
                        
  ?>

                <tr>
                  <td><?php echo $all["id_player"];?></td>
                   <td><?php echo $all["firstname"];?></td>
                   <td><?php echo $all["lastname"];?></td>
                   <td><?php echo $diff->format('%y');?></td>
                   <td><?php echo $all["goal"];?></td>
                </tr>
                <?php
              };
             ?>
        </table>
      </div>

      <?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "footer.php" ?>
