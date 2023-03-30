{if !empty($topAlert) && !$readAlert}
    <div class="alert alert-{$topAlert.type} shadow-md" id="topAlert">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                class="stroke-current flex-shrink-0 w-6 h-6">
                {if $topAlert.type == "info"}
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                {elseif $topAlert.type == "success"}
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                {elseif $topAlert.type == "warning"}
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                {else}
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                {/if}
            </svg>
            <span><b>{ucfirst($topAlert.type)}:</b> {$topAlert.content}</span>
        </div>
        {if $logged}
            <div class="flex-none m-0 p-0">
                <button class="btn btn-sm m-0 mikuLink" id="dismissAlert">Dismiss</button>
            </div>
        {/if}
    </div>
{/if}

{if $logged && $user.level == 49}
    <div class="alert alert-info shadow-md" id="topAlert">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                class="stroke-current flex-shrink-0 w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span><b>Info:</b> Activate your account through the Email we sent you to use all functions of {$config.title}!</span>
        </div>
    </div>
{/if}