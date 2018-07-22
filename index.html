<?php include('header.php'); ?>
<div class="container">
<p class='h1'>The Greatest FIAB Movie searcher</p>
<div class="row justify-content-md-center">
  <div class="col">
    <div class="form-group">
      <label for="movietitle">Movie Title (or part of)</label>
      <input type="text" class="form-control" id="movietitle" aria-describedby="movieInfo" placeholder="Search for a Movie">
      <small id="movieInfo" class="form-text text-muted">Use different databases to search for a movie</small>
      <div id='buttons'>
      </div>
    </div>
  </div>
</div>
<div class="container">
<div class="row info-panel justify-content-md-center" id='search_results'>
</div>
</div>
<script type="text/javascript">
  $(function() {
    $.getJSON("/api.php?req=providers").done(function(data) {
      $.each(data, function(i, item) {
        $('#buttons').append('<button type="button" class="btn btn-primary" id="'+item.provider+'">'+item.name+'</button>\n');
      });
      // show providers available
      $(".btn").click(function() {
        $('#search_results').empty();
        $('#search_results').append('<div class="card"><img src="/spin.gif"></div>');
        $.getJSON("/api.php?req=search&q="+$('#movietitle').val()+"&provider="+this.id).done(function(data) {
          // show results
          $('#search_results').empty();
          $.each(data.results, function(i, item) {
            $("#search_results").append('<div class="card" style="width: 18rem;"> \
  <div class="card-body"> \
    <h5 class="card-title">'+item.title+' ('+item.year+')</h5> \
    <a href="/show.php?id='+item.imdbID+'&provider='+item.provider+'" class="btn btn-primary">More info</a> \
  </div> \
</div>');
          })
        })
      });    
    });
  });
</script>
<?php include ('footer.php'); ?>