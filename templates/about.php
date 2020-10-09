<section class="about col-4" id="aboutId">
    <h5>About</h5>
    <div class="card grey">
        <div class="card-body">
            <h5 class="card-title">About <?php echo $brandName['brandname']; ?></h5>
            <p class="card-text" id="about"><?php echo $brandName['about']; ?></p>
            
            <button class="more btn btn-sm" data-toggle="modal" data-target="#exampleModal">Read More...</button>

            <div class="about-links">
                <p>Follow us on:</p>
                <?php foreach($links as $link):?>
                    <a href="<?php echo $link['link']; ?>"><i class="<?php echo $link['icon']; ?>"></i></a>    
                <?php endforeach;?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">About <?php echo $brandName['brandname']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><?php echo $brandName['about']; ?></p>
                    <div class="about-links">
                        <p>Follow us on:</p>
                        <?php foreach($links as $link):?>
                            <a href="<?php echo $link['link']; ?>"><i class="<?php echo $link['icon']; ?>"></i></a>    
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>