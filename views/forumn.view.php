
<h5>Open a new discussion</h5>
    <div class="card forumn-post">
        <div class="card-body">
            <form method="POST" action="models/db/forumn-post-a-discussion.php">
                <h5 class="card-title">
                    <input type="text" class="form-control form-control-sm" placeholder="Your discussion here..." name="body" >
                </h5>
                <p class="card-text">
                    <label>Posted by @</label>
                    <input type="text" class="form-control form-control-sm" placeholder="username" name="author">
                </p>

                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</form>

<h5 style="margin-top: 2rem;">Forum discussions</h5>
<?php 
    if(count($posts) > 0){
        foreach($posts as $post){
            echo '<div class="card forumn-post"><div class="card-body"><h5 class="card-title">' . substr($post->getBody(), 0, 150) . '... <a href="">Read more...</a></h5><p class="card-text">Posted by @' . $post->getAuthor() . '</p></div></div>';
        }
    }
?>