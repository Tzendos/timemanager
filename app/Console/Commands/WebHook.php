<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;

class WebHook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:webhook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set webhook for telegram';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new Client(['base_uri' => 'https://api.telegram.org/bot' . \config('telegram.bot_token') . '/']);

        $response = $client->request('POST', 'setwebhook', [
            'query' => ['url' => 'https://167.172.102.22/' . \config('telegram.bot_token')]
        ]);

        $json = $response->getBody();

        if (empty($json['ok']) && $json['ok'] === true) {
            $this->output->writeln('Success');
        } else {
            $this->output->error('Failed');
        }
    }
}
