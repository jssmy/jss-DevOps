<?php

namespace GitScrum\Observers;

use GitScrum\Models\ProductBacklog;
use GitScrum\Models\Organization;
use GitScrum\Classes\Helper;
use Auth;

class ProductBacklogObserver
{
    public function creating(ProductBacklog $productBacklog)
    {
        if (!isset($productBacklog->user_id)) {
            $productBacklog->user_id = Auth::user()->githubUser()->id;
        }

        if (isset($productBacklog->is_api)) {
            $productBacklog->provider_id = mt_rand(0,9999999);
        }
        $productBacklog->slug = Helper::slug($productBacklog->title);
        if (isset($productBacklog->is_api)) {
            $owner = Organization::find($productBacklog->organization_id);
            $productBacklog::$tmp = app(Auth::user()->githubUser()->provider)->createOrUpdateRepository($owner->username, $productBacklog);
        }
    }

    public function created(ProductBacklog $productBacklog)
    {
        if (isset($productBacklog->is_api)) {
            $template = app(Auth::user()->githubUser()->provider)->tplRepository($productBacklog::$tmp, $productBacklog->slug);
            if (! is_null($template)) {
                $obj = ProductBacklog::slug($template->slug)->first();
                unset($template->organization_title);
                $obj->update(get_object_vars($template));
            }
            $productBacklog::$tmp = null;
        }

    }

    public function updating(ProductBacklog $productBacklog)
    {
        $oldRepos = ProductBacklog::find($productBacklog->id);
        $owner = Organization::find($productBacklog->organization_id);
        $repos = app(Auth::user()->githubUser()->provider)->createOrUpdateRepository($owner->username, $productBacklog, $oldRepos->title);
        //dd($repos);
        // skip update if repos object is null to prevent error
        if (! is_null($repos) && $repos->message!='Not Found') {
            $productBacklog->html_url = (!isset($repos->html_url) ? null : $repos->html_url);
            $productBacklog->ssh_url =  (!isset($repos->ssh_url)? null: $repos->ssh_url);
            $productBacklog->clone_url = (!isset($repos->clone_url)?null: $repos->clone_url);
            $productBacklog->url = (!isset($repos->url)?null: $repos->url);
        }
    }
}
