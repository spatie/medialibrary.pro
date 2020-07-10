<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class DropMailcoachTables extends Migration
{
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('mailcoach_email_lists');
        Schema::dropIfExists('mailcoach_subscribers');
        Schema::dropIfExists('mailcoach_segments');
        Schema::dropIfExists('mailcoach_campaigns');
        Schema::dropIfExists('mailcoach_campaign_links');
        Schema::dropIfExists('mailcoach_sends');
        Schema::dropIfExists('mailcoach_campaign_clicks');
        Schema::dropIfExists('mailcoach_campaign_opens');
        Schema::dropIfExists('mailcoach_campaign_unsubscribes');
        Schema::dropIfExists('mailcoach_send_feedback_items');
        Schema::dropIfExists('mailcoach_templates');
        Schema::dropIfExists('mailcoach_subscriber_imports');
        Schema::dropIfExists('mailcoach_tags');
        Schema::dropIfExists('mailcoach_email_list_subscriber_tags');
        Schema::dropIfExists('mailcoach_email_list_allow_form_subscription_tags');
        Schema::dropIfExists('mailcoach_positive_segment_tags');
        Schema::dropIfExists('mailcoach_negative_segment_tags');
        Schema::enableForeignKeyConstraints();
    }
}
