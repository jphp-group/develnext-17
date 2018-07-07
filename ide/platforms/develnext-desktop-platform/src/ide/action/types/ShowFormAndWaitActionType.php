<?php
namespace ide\action\types;

use action\Element;
use ide\action\AbstractSimpleActionType;
use ide\action\Action;
use ide\action\ActionScript;
use php\lib\Str;

class ShowFormAndWaitActionType extends AbstractSimpleActionType
{
    function attributes()
    {
        return [
            'form' => 'form',
        ];
    }

    function attributeLabels()
    {
        return [
            'form' => 'wizard.name.of.form::Название формы'
        ];
    }

    function getHelpText()
    {
        return "wizard.command.show.form.and.wait.help.text::Если у выбранной формы будет выставлен флаг 'Модальность', то все остальные окна будут заблокированы, пока форма не закроется.";
    }


    function getSubGroup()
    {
        return self::SUB_GROUP_WINDOW;
    }

    function getGroup()
    {
        return self::GROUP_CONTROL;
    }

    function getTagName()
    {
        return 'showFormAndWait';
    }

    function getTitle(Action $action = null)
    {
        return 'wizard.command.show.form.and.wait::Открыть форму и ждать';
    }

    function getDescription(Action $action = null)
    {
        if ($action == null) {
            return "wizard.command.desc.show.form.and.wait::Открыть форму и ждать её закрытия";
        }

        return _("wizard.command.desc.param.show.form.and.wait::Открыть форму {0} и ждать её закрытия", $action->get('form'));
    }

    function getIcon(Action $action = null)
    {
        return 'icons/showFormAndWait16.png';
    }

    /**
     * @param Action $action
     * @param ActionScript $actionScript
     * @return string
     */
    function convertToCode(Action $action, ActionScript $actionScript)
    {
        $form = $action->get('form');

        return "app()->showFormAndWait({$form})";
    }
}