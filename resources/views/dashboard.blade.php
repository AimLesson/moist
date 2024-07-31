            <!-- Role-based Redirection -->
            @auth
                @php
                    $role = auth()->user()->role; // Assuming your User model has a 'role' attribute
                @endphp

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var role = @json($role);

                        if (role === 'admin' || role === 'owner') {

                        } else {
                            window.location.href = "{{ url('/') }}";
                        }
                    });
                </script>
            @endauth

<!-- resources/views/orders/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    <!-- Chart Container -->
                    <canvas id="salesChart" width="400" height="200"></canvas>

                    <script>
                        // Define chart data variables with fallback to empty array if undefined
                        const dates = @json($dates ?? []);
                        const totals = @json($totals ?? []);

                        const ctx = document.getElementById('salesChart').getContext('2d');
                        const salesChart = new Chart(ctx, {
                            type: 'line', // Using line chart for better daily data visualization
                            data: {
                                labels: dates, // Dates for the x-axis
                                datasets: [{
                                    label: 'Daily Sales',
                                    data: totals, // Total sales data for each day
                                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 2,
                                    fill: false, // Do not fill under the line
                                    tension: 0.1 // Smooth line
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        title: {
                                            display: true,
                                            text: 'Sales in USD'
                                        }
                                    },
                                    x: {
                                        title: {
                                            display: true,
                                            text: 'Date'
                                        }
                                    }
                                },
                                plugins: {
                                    title: {
                                        display: true,
                                        text: 'Daily Sales Overview'
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



