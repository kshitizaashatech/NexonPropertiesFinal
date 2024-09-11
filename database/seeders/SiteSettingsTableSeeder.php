<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;
use App\Models\Metadata;

class SiteSettingsTableSeeder extends Seeder
{
    public function run()
    {
        // Find the metadata record that you want to use.
        $metadata = Metadata::find(1); // Use the ID of the metadata record you want.

        // Check if the metadata exists
        if ($metadata) {
            // Check if the SiteSetting record exists
            $siteSetting = SiteSetting::find(1); // Replace '1' with the ID of the SiteSetting you want to update

            if ($siteSetting) {
                // Update the existing SiteSetting record with metadata and other fields
                $siteSetting->update([
                    'office_title' => 'Sample Office',
                    'office_address' => json_encode(['Street' => '123 Sample St', 'City' => 'Sample City', 'Country' => 'Sample Country']),
                    'office_contact' => json_encode(['Phone' => '+123456789', 'Fax' => '+987654321']),
                    'office_email' => json_encode(['info@example.com', 'support@example.com']),
                    'office_description' => 'This is a sample office description.',
                    'established_year' => '2000',
                    'slogan' => 'Sample Slogan',
                    'main_logo' => 'logo.png',
                    'side_logo' => 'side_logo.png',
                    'status' => true,
                    'metadata_id' => $metadata->id,
                    'social_links_id' => 1, // Assuming social_links_id is static
                ]);
            } else {
                // If the SiteSetting record does not exist, create it
                SiteSetting::create([
                    'office_title' => 'Sample Office',
                    'office_address' => json_encode(['Street' => '123 Sample St', 'City' => 'Sample City', 'Country' => 'Sample Country']),
                    'office_contact' => json_encode(['Phone' => '+123456789', 'Fax' => '+987654321']),
                    'office_email' => json_encode(['info@example.com', 'support@example.com']),
                    'office_description' => 'This is a sample office description.',
                    'established_year' => '2000',
                    'slogan' => 'Sample Slogan',
                    'main_logo' => 'logo.png',
                    'side_logo' => 'side_logo.png',
                    'status' => true,
                    'metadata_id' => $metadata->id,
                    'social_links_id' => 1, // Assuming social_links_id is static
                ]);
            }
        } else {
            // Log or handle case when metadata is not found.
            echo "Metadata not found!";
        }
    }
}
