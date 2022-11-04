<?php
if (!empty($args))
{
    $background_image = isset($args['background_image']) ? $args['background_image'] : '';
    $heading = isset($args['heading']) ? $args['heading'] : '';
    $content = isset($args['content']) ? $args['content'] : '';
    $button = isset($args['button']) ? $args['button'] : array();

    if (!empty($background_image) || !empty($heading) || !empty($content) || !empty($button))
    {
        $bg_image = '';
        if(!empty($background_image))
        {
            $bg_image = 'style="background-image:url('.$background_image.');"';
        }
        ?>
        <section class="cta-section py-xs-45 py-sm-100 relative" <?php echo $bg_image;?>>
            <div class="container color-white">
                <div class="row align-items-center">
                    <?php
                    if (!empty($heading) || !empty($content))
                    { ?>
                        <div class="col-sm-7">
                            <?php
                            if (!empty($heading))
                            { ?>
                                <h2 class="section-heading color-white mb-20">
                                    <?php echo $heading; ?>
                                </h2>
                                <?php
                            }
                            if (!empty($content))
                            {   ?>
                                <p class="section-content">
                                    <?php echo $content; ?>
                                </p>
                                <?php
                            } 
                            ?>
                        </div>
                        <?php 
                    } 
                    if (!empty($button)) 
                    {   ?>
                        <div class="col-sm-5 text-xs-center text-right">
                            <?php
                            $cta_link = isset($button['url']) ? $button['url'] : '';
                            $cta_title = isset($button['title']) ? $button['title'] : '';
                            $cta_target = !empty($button['target']) ? 'target="_blank"' : '';
                            if (!empty($cta_link) && !empty($cta_title)) 
                            {   ?>
                                <a class="btn btn-white" href="<?php echo $cta_link; ?>" <?php echo $cta_target; ?> title="<?php echo $cta_title; ?>">
                                    <?php echo $cta_title; ?>
                                </a>
                                <?php 
                            }
                            ?>
                        </div>
                        <?php 
                    } ?>
                </div>
            </div>
        </section>
    <?php 
    }
}?>