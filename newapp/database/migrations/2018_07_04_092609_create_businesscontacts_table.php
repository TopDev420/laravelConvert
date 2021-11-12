<?php
/**
 * Migration genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Dwij\Laraadmin\Models\Module;

class CreateBusinesscontactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Module::generate("Businesscontacts", 'businesscontacts', 'direct_phone', 'fa-group', [
            ["direct_phone", "Direct Phone", "Mobile", false, "", 0, 256, false],
            ["elink", "E.LinkedIn URL", "URL", false, "", 0, 256, false],
            ["clink", "C.LinkedIn URL", "URL", false, "", 0, 256, false],
            ["address1", "Address1", "Address", false, "", 0, 256, false],
            ["address2", "Address2", "Address", false, "", 0, 256, false],
            ["county", "County", "Address", false, "", 0, 256, false],
            ["active", "Hidden", "Integer", false, "", 0, 256, false],
            ["Business Model", "business_model", "String", false, "", 0, 256, false],
            ["first_name", "First Name", "Name", false, "", 0, 256, false],
            ["last_name", "Last Name", "Name", false, "", 0, 256, false],
            ["job_title", "Job Title", "Name", false, "", 0, 256, false],
            ["email_address", "Email Address", "Email", false, "", 0, 256, false],
            ["company_name", "Company Name", "Name", false, "", 0, 256, false],
            ["company_website", "Company Website", "Name", false, "", 0, 256, false],
            ["phone_number", "Phone Number", "Mobile", false, "", 0, 256, false],
            ["city", "City", "Name", false, "", 0, 256, false],
            ["state", "State", "Name", false, "", 0, 256, false],
            ["zipcode", "Zipcode", "String", false, "", 0, 256, false],
            ["country", "Country", "Name", false, "", 0, 256, false],
            ["industries", "Industries", "Name", false, "", 0, 256, false],
            ["employees", "Employees", "String", false, "", 0, 256, false],
            ["revenue", "Revenue", "String", false, "", 0, 256, false],
        ]);
		
		/*
		Row Format:
		["field_name_db", "Label", "UI Type", "Unique", "Default_Value", "min_length", "max_length", "Required", "Pop_values"]
        Module::generate("Module_Name", "Table_Name", "view_column_name" "Fields_Array");
        
		Module::generate("Books", 'books', 'name', [
            ["address",     "Address",      "Address",  false, "",          0,  1000,   true],
            ["restricted",  "Restricted",   "Checkbox", false, false,       0,  0,      false],
            ["price",       "Price",        "Currency", false, 0.0,         0,  0,      true],
            ["date_release", "Date of Release", "Date", false, "date('Y-m-d')", 0, 0,   false],
            ["time_started", "Start Time",  "Datetime", false, "date('Y-m-d H:i:s')", 0, 0, false],
            ["weight",      "Weight",       "Decimal",  false, 0.0,         0,  20,     true],
            ["publisher",   "Publisher",    "Dropdown", false, "Marvel",    0,  0,      false, ["Bloomsbury","Marvel","Universal"]],
            ["publisher",   "Publisher",    "Dropdown", false, 3,           0,  0,      false, "@publishers"],
            ["email",       "Email",        "Email",    false, "",          0,  0,      false],
            ["file",        "File",         "File",     false, "",          0,  1,      false],
            ["files",       "Files",        "Files",    false, "",          0,  10,     false],
            ["weight",      "Weight",       "Float",    false, 0.0,         0,  20.00,  true],
            ["biography",   "Biography",    "HTML",     false, "<p>This is description</p>", 0, 0, true],
            ["profile_image", "Profile Image", "Image", false, "img_path.jpg", 0, 250,  false],
            ["pages",       "Pages",        "Integer",  false, 0,           0,  5000,   false],
            ["mobile",      "Mobile",       "Mobile",   false, "+91  8888888888", 0, 20,false],
            ["media_type",  "Media Type",   "Multiselect", false, ["Audiobook"], 0, 0,  false, ["Print","Audiobook","E-book"]],
            ["media_type",  "Media Type",   "Multiselect", false, [2,3],    0,  0,      false, "@media_types"],
            ["name",        "Name",         "Name",     false, "John Doe",  5,  250,    true],
            ["password",    "Password",     "Password", false, "",          6,  250,    true],
            ["status",      "Status",       "Radio",    false, "Published", 0,  0,      false, ["Draft","Published","Unpublished"]],
            ["author",      "Author",       "String",   false, "JRR Tolkien", 0, 250,   true],
            ["genre",       "Genre",        "Taginput", false, ["Fantacy","Adventure"], 0, 0, false],
            ["description", "Description",  "Textarea", false, "",          0,  1000,   false],
            ["short_intro", "Introduction", "TextField",false, "",          5,  250,    true],
            ["website",     "Website",      "URL",      false, "http://dwij.in", 0, 0,  false],
        ]);
		*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('businesscontacts')) {
            Schema::drop('businesscontacts');
        }
    }
}
