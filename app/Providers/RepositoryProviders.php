<?php

namespace App\Providers;

use App\Interface\CaseBaseInterface;
use App\Interface\DataAcInterface;
use App\Interface\GejalaInterface;
use App\Interface\HistoriIdentifikasiInterface;
use App\Interface\HistoryInterface;
use App\Interface\MerekAcInterface;
use App\Interface\PenyetujuInterface;
use App\Interface\SolusiInterface;
use App\Interface\TeknisiInterface;
use App\Interface\TokenizeInterface;
use App\Interface\UserInterface;
use App\Repo\CaseBaseRepo;
use App\Repo\DataAcRepo;
use App\Repo\GejalaRepo;
use App\Repo\HistoriIdentifikasiRepo;
use App\Repo\HistoryRepo;
use App\Repo\MerekAcRepo;
use App\Repo\PenyetujuRepo;
use App\Repo\SolusiRepo;
use App\Repo\TeknisiRepo;
use App\Repo\TokenizeRepo;
use App\Repo\UserRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryProviders extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserInterface::class, UserRepo::class);
        $this->app->bind(TeknisiInterface::class, TeknisiRepo::class);
        $this->app->bind(TokenizeInterface::class, TokenizeRepo::class);
        $this->app->bind(MerekAcInterface::class, MerekAcRepo::class);
        $this->app->bind(DataAcInterface::class, DataAcRepo::class);
        $this->app->bind(HistoryInterface::class, HistoryRepo::class);
        $this->app->bind(PenyetujuInterface::class, PenyetujuRepo::class);
        $this->app->bind(CaseBaseInterface::class, CaseBaseRepo::class);
        $this->app->bind(GejalaInterface::class, GejalaRepo::class);
        $this->app->bind(HistoriIdentifikasiInterface::class, HistoriIdentifikasiRepo::class);
        $this->app->bind(SolusiInterface::class, SolusiRepo::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
