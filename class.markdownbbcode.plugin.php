<?php if (!defined('APPLICATION')) exit();

$PluginInfo['MarkdownBBCode'] = array(
  'Name' => 'Markdown BBCode',
  'Description' => 'Process BBCode in addition to Markdown',
  'Version' => '1.0',
  'MobileFriendly' => TRUE,
  'Author' => 'Wilson29thID',
  'AuthorEmail' => 'wilson@29th.org',
  'AuthorUrl' => 'http://29th.org',
  'License' => 'MIT'
);

class TwentyNinthRank extends Gdn_Plugin {

  public function Base_AfterCommentPreviewFormat_Handler($Sender, $Args) {
    if(C('Garden.InputFormatter') == 'Markdown') {
      $Sender->Comment->Body = Gdn_Format::To($Sender->Comment->Body, GetValue('Format', $Sender->Comment, 'BBCode'));;
    }
  }

  public function DiscussionController_AfterCommentFormat_Handler($Sender, $Args) {
    if(C('Garden.InputFormatter') == 'Markdown') {
      $Args['Object']->FormatBody = Gdn_Format::To($Args['Object']->FormatBody, 'BBCode');
    }
  }

}
