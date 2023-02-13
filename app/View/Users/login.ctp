<div class="div-center">
    <div class="content">
        <h3>Login</h3>
        <hr />

        <?php

        $form = $this->Form->create('User');
        $form .= $this->Form->input('username', array(
            'label' => 'Usuário',
            'placeholder' => 'Usuário',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        $form .= $this->Form->input('password', array(
            'label' => 'Senha',
            'placeholder' => 'Senha',
            'type' => 'passoword',
            'div' => 'form-group',
            'class' => 'form-control'
        ));

        $form .= $this->Form->end(
            array(
                'label' => 'Entrar',
                'class' => 'btn',
            )
        );

        echo $form;
        ?>
    </div>
</div>
