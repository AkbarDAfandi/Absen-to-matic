<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\history;

class DeleteHistoryRecords extends Command
{
    protected $signature = 'history:delete';

    protected $description = 'Menghapus data dari daftar kehadiran yang sudah lewat 1 hari';

    public function handle()
    {
        $deleted = history::where('created_at', '<', now()->subDay())->delete();

        $this->info("Deleted {$deleted} rekap hari ini telah di hapus.");
    }
}
