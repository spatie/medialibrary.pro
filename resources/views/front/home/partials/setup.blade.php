<header class="mb-12 md:text-center">
    <h2 class="markup-h1">Dead simple setup</h2>
    <p class="markup-baseline">Start sending out newsletters in no time</p>
</header>

<div class="grid gap-12 md:cols-2 items-center dense">
    <div class="">
        <ol class="grid gap-4 markup-ol text-xl">
            <li>
                Grab your license
            </li>
            <li>
                <div>
                Setup Laravel hosting<br/>
                or use in an existing project
                </div>
            </li>
            <li>
                Install the package
            </li>
            <li>
                <div class="flex-1">Configure an email&nbsp;service</div>
            </li>
        </ol>
        <p class="mt-6 text-lg">
            <a href="{{ route('docs') }}" class="markup-link">Read the installation docs</a>
        </p>
    </div>

    <div class="md:start-1">
        <a href="{{ route('register') }}" class="button text-xl">
            Grab your license for only <span class="currency">$</span>99
        </a>
    </div>

    <div class="mt-12 | md:mt-0">
        <h3 class="markup-h2">
            Take the shortcut
        </h3>
        <p><span class="markup-baseline text-base">Mailcoach pre-installed on Digital Ocean</span> <i class="ml-1 fab fa-digital-ocean text-xl text-blue-500"></i></p>
        <div class="mt-4 text-lg">
            <p>
                Setting up a new server with Mailcoach is super easy. Check out our <a href="/docs/app/installation/using-the-1-click-installer" class="markup-link">1-click installer</a> on the DigitalOcean Marketplace.
            </p>
        </div>

        <h3 class="mt-12 markup-h2">
            Pick a delivery service
        </h3>
        <div class="mt-4 text-lg">
            <p>
                Mailcoach can be configured with SMTP or one of the following affordable email services.
            </p>
        </div>
    </div>

    <ul class="md:start-2 grid cols-auto justify-start md:cols-3 gap-1">
        <li>
            <a class="button-white w-full rounded-r-none" href="https://aws.amazon.com/ses/" target="_blank">
                <img class="mx-auto my-1 h-6" src="/images/logos/aws.svg">
            </a>
        </li>
        <li>
            <a class="button-white w-full rounded-none" href="https://mailgun.com" target="_blank">
                <img class="mx-auto my-1 h-6" src="/images/logos/mailgun.svg">
            </a>
        </li>
        <li>
            <a class="button-white w-full rounded-l-none" href="https://sendgrid.com" target="_blank">
                <img class="mx-auto my-1 h-6" src="/images/logos/sendgrid.svg">
            </a>
        </li>
    </ul>
</div>
