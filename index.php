<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Project Euler | High score</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/main.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <div class="row">
      <div class="large-12 columns">
        <h1>Project Euler High Score</h1>
      </div>
    </div>
    
    <div class="row">
      <div class="large-12 columns">
        <div class="panel">
          <div id="high-score">
            <table id="high-score-table" class="large-12">
              <thead>
                <tr>
                  <th>Nickname</th>
                  <th>Problems solved</th>
                  <th>Level</th>
                  <th>Language of choice</th>
                  <th>Country</th>
                </tr>
              </thead>
              <tbody>
                <!-- TODO: add php or js to add all known usernames-->
              </tbody>
            </table>
          </div>
          <div id="register-nickname-form">
            <h5>Register username</h5>
            <form>
              <div class="row collapse">
                <label>Input Label</label>
                <div class="small-10 columns">
                  <input type="text" name="username" placeholder="Username" />
                </div>
                <div class="small-2 columns">
                  <a href="#" class="button postfix" name="submit_username">Submit</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/main.js"></script>
    <script>
    $(document).foundation();
    </script>
  </body>
</html>