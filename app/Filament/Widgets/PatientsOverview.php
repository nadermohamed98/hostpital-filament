<?php

namespace App\Filament\Widgets;

use App\Models\Patient;
use App\Models\Surgery;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Section;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Contracts\View\View;

class PatientsOverview extends BaseWidget
{
    // protected static string $view = 'filament.widgets.patient-stats-widget';
    protected function getStats(): array
    {
        $newPatientsCount = Patient::whereDate('created_at', '>=', now()->subMonth())->count();
        $malesCount = Patient::where('type', 'male')->count();
        $femalesCount = Patient::where('type', 'female')->count();
        $gynSurgeries = Surgery::where('type', 'gyn')->count();
        $maleSurgeries = Surgery::where('type', 'male')->count();
        $egyptiansCount = Patient::where('country_id', 1) // Assuming Egypt has id = 1
            ->count();
        $nonEgyptiansCount = Patient::where('country_id', '!=', 1)->count();

        return [
            Stat::make('New Patients', $newPatientsCount)
                ->description('Number of patients added in the last month')
                ->color('danger'), // Blue color for "New Patients"

            Stat::make('Male Patients', $malesCount)
                ->description('Number of male patients')
                ->color('success'), // Green color for "Male Patients"

            Stat::make('Female Patients', $femalesCount)
                ->description('Number of female patients')
                ->color('warning'), // Red color for "Female Patients"

            Stat::make('Gyn Operations', $gynSurgeries)
                ->description('Number of Gyn Operations')
                ->color('warning'), // Yellow color for "Gyn Operations"

            Stat::make('Male Operations', $maleSurgeries)
                ->description('Number of Male Operations')
                ->color('success'), // Light Blue color for "Male Operations"

            Stat::make('Egyptians Patients', $egyptiansCount)
                ->description('Number of Egyptian patients')
                ->color('info'), // Green color for "Egyptians Patients"

            Stat::make('Foreigners Patients', $nonEgyptiansCount)
                ->description('Number of Foreigners patients')
                ->color('info'), // Blue color for "Foreigners Patients"
        ];
    }

    // public function render(): View
    // {
    //     // Calculate the statistics
    //     $newPatientsCount = Patient::whereDate('created_at', '>=', now()->subMonth())->count();
    //     $malesCount = Patient::where('type', 'male')->count();
    //     $femalesCount = Patient::where('type', 'female')->count();
    //     $egyptiansCount = Patient::where('country_id', 1) // Assuming Egypt has id = 1
    //         ->count();
    //     $nonEgyptiansCount = Patient::where('country_id', '!=', 1)->count();

    //     // Pass the statistics to the widget view
    //     return view('filament.widgets.patient-stats-widget', [
    //         'newPatientsCount' => $newPatientsCount,
    //         'malesCount' => $malesCount,
    //         'femalesCount' => $femalesCount,
    //         'egyptiansCount' => $egyptiansCount,
    //         'nonEgyptiansCount' => $nonEgyptiansCount,
    //     ]);
    // }

    // protected function getCards(): array
    // {
    //     return [
    //         Card::make('New Patients', $this->newPatientsCount)
    //             ->description('Number of patients added in the last month')
    //             ->icon('heroicon-o-user-group'),
    //         Card::make('Males', $this->malesCount)
    //             ->description('Number of male patients')
    //             ->icon('heroicon-o-male'),
    //         Card::make('Females', $this->femalesCount)
    //             ->description('Number of female patients')
    //             ->icon('heroicon-o-female'),
    //         Card::make('Egyptians', $this->egyptiansCount)
    //             ->description('Number of Egyptian patients')
    //             ->icon('heroicon-o-globe-alt'),
    //         Card::make('Non-Egyptians', $this->nonEgyptiansCount)
    //             ->description('Number of non-Egyptian patients')
    //             ->icon('heroicon-o-globe-alt'),
    //     ];
    // }

    protected function getColumns(): int
    {
        return 4;
    }
}
