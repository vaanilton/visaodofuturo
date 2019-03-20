<?php

use yii\db\Migration;

/**
 * Class m181018_232942_init_rbac
 */
class m181018_232942_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        // adciona a permissão "createPost"
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // adciona a permissão  "updatePost"
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        // adciona a permissão "viewPost"
        $viewPost = $auth->createPermission('updatePost');
        $viewPost ->description = 'View post';
        $auth->add($viewPost);

        // adciona a permissão "deletePost"
        $deletePost = $auth->createPermission('deletePost');
        $deletePost ->description = 'Delete post';
        $auth->add($deletePost);

        // adciona a role "Operador" e da a esta role a permissão "createPost" "updatePost" "viewPost"
        $operador = $auth->createRole('Operador');
        $auth->add($operador);
        $auth->addChild($operador, $createPost);
        $auth->addChild($operador, $viewPost);

        $fiel = $auth->createRole('Fiel_Armazen');
        $auth->add($fiel);
        $auth->addChild($fiel, $updatePost);
        $auth->addChild($fiel, $operador);

        $gestor = $auth->createRole('Gestor');
        $auth->add($gestor);
        $auth->addChild($gestor, $fiel);

        // adciona a role "admin" e da a esta role a permissão "updatePost"
        // bem como as permissões da role "author"
        $admin = $auth->createRole('administrador');
        $auth->add($admin);
        $auth->addChild($admin, $deletetePost);
        $auth->addChild($admin, $gestor);

        // Atribui roles para usuários. 1 and 2 são IDs retornados por IdentityInterface::getId()
        // normalmente implementado no seu model User.
        $auth->assign($operador, 4);
        $auth->assign($fiel, 3);
        $auth->assign($gestor, 2);
        $auth->assign($admin, 1);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181018_232942_init_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181018_232942_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
