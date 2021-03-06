<?php ob_start(); ?>
    <h2>
        <a href="/show_section/<?php echo htmlspecialchars( $this->Section->Id ); ?>">
            <?php echo htmlspecialchars( $this->Section->Name ); ?>
        </a>
    </h2>
    <h4>
        <a href="/show_article/<?php echo htmlspecialchars( $this->Article->Id ); ?>">
            <?php echo htmlspecialchars( $this->Article->Title ); ?>
        </a>
    </h4>
    <h5>
        <?php echo htmlspecialchars( $this->Article->User->Pseudonym ); ?> - <?php echo htmlspecialchars( $this->Article->Date ); ?>
    </h5>
    <img class="responsive-img" src="/static/img/<?php echo htmlspecialchars( $this->Article->ImageIndex ); ?>.jpg"/>
    <p>
        <?php echo htmlspecialchars( $this->Article->Text ); ?>
    </p>
    <hr/>
    <?php if ( $this->Session->UserIsConnected ) { ?>
        <h4>
            Comment
        </h4>
        <form action="/add_comment/<?php echo htmlspecialchars( $this->Article->Id ); ?>/" method="post">
            <label for="text">
                Text :
            </label>
            <textarea id="text" name="text"/></textarea>
            <input type="submit" value="Send">
        </form>
    <?php } ?>
    <br/>
    <?php foreach ( $this->CommentArray as  $comment ) { ?>
        <h5>
            <?php echo htmlspecialchars( $comment->User->Pseudonym ); ?> - <?php echo htmlspecialchars( $comment->Date ); ?>
        </h5>
        <p>
            <?php echo htmlspecialchars( $comment->Text ); ?>
        </p>
    <?php } ?>
<?php $this->MainContent = ob_get_clean(); ?>
