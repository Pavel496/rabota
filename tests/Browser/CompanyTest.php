<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class CompanyTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateCompany()
    {
        $admin = \App\User::find(1);
        $company = factory('App\Company')->make();

        $relations = [
            factory('App\Sphere')->create(), 
            factory('App\Sphere')->create(), 
        ];

        $this->browse(function (Browser $browser) use ($admin, $company, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.companies.index'))
                ->clickLink('Add new')
                ->type("name", $company->name)
                ->type("describition", $company->describition)
                ->select('select[name="sphere[]"]', $relations[0]->id)
                ->select('select[name="sphere[]"]', $relations[1]->id)
                ->type("address", $company->address)
                ->type("site", $company->site)
                ->type("phone", $company->phone)
                ->type("contacts", $company->contacts)
                ->type("rating", $company->rating)
                ->type("moder_checking", $company->moder_checking)
                ->press('Save')
                ->assertRouteIs('admin.companies.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $company->name)
                ->assertSeeIn("tr:last-child td[field-key='describition']", $company->describition)
                ->assertSeeIn("tr:last-child td[field-key='sphere'] span:first-child", $relations[0]->title)
                ->assertSeeIn("tr:last-child td[field-key='sphere'] span:last-child", $relations[1]->title)
                ->assertSeeIn("tr:last-child td[field-key='address']", $company->address)
                ->assertSeeIn("tr:last-child td[field-key='site']", $company->site)
                ->assertSeeIn("tr:last-child td[field-key='phone']", $company->phone)
                ->assertSeeIn("tr:last-child td[field-key='contacts']", $company->contacts)
                ->assertSeeIn("tr:last-child td[field-key='rating']", $company->rating)
                ->assertSeeIn("tr:last-child td[field-key='moder_checking']", $company->moder_checking);
        });
    }

    public function testEditCompany()
    {
        $admin = \App\User::find(1);
        $company = factory('App\Company')->create();
        $company2 = factory('App\Company')->make();

        $relations = [
            factory('App\Sphere')->create(), 
            factory('App\Sphere')->create(), 
        ];

        $this->browse(function (Browser $browser) use ($admin, $company, $company2, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.companies.index'))
                ->click('tr[data-entry-id="' . $company->id . '"] .btn-info')
                ->type("name", $company2->name)
                ->type("describition", $company2->describition)
                ->select('select[name="sphere[]"]', $relations[0]->id)
                ->select('select[name="sphere[]"]', $relations[1]->id)
                ->type("address", $company2->address)
                ->type("site", $company2->site)
                ->type("phone", $company2->phone)
                ->type("contacts", $company2->contacts)
                ->type("rating", $company2->rating)
                ->type("moder_checking", $company2->moder_checking)
                ->press('Update')
                ->assertRouteIs('admin.companies.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $company2->name)
                ->assertSeeIn("tr:last-child td[field-key='describition']", $company2->describition)
                ->assertSeeIn("tr:last-child td[field-key='sphere'] span:first-child", $relations[0]->title)
                ->assertSeeIn("tr:last-child td[field-key='sphere'] span:last-child", $relations[1]->title)
                ->assertSeeIn("tr:last-child td[field-key='address']", $company2->address)
                ->assertSeeIn("tr:last-child td[field-key='site']", $company2->site)
                ->assertSeeIn("tr:last-child td[field-key='phone']", $company2->phone)
                ->assertSeeIn("tr:last-child td[field-key='contacts']", $company2->contacts)
                ->assertSeeIn("tr:last-child td[field-key='rating']", $company2->rating)
                ->assertSeeIn("tr:last-child td[field-key='moder_checking']", $company2->moder_checking);
        });
    }

    public function testShowCompany()
    {
        $admin = \App\User::find(1);
        $company = factory('App\Company')->create();

        $relations = [
            factory('App\Sphere')->create(), 
            factory('App\Sphere')->create(), 
        ];

        $company->sphere()->attach([$relations[0]->id, $relations[1]->id]);

        $this->browse(function (Browser $browser) use ($admin, $company, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.companies.index'))
                ->click('tr[data-entry-id="' . $company->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $company->name)
                ->assertSeeIn("td[field-key='describition']", $company->describition)
                ->assertSeeIn("tr:last-child td[field-key='sphere'] span:first-child", $relations[0]->title)
                ->assertSeeIn("tr:last-child td[field-key='sphere'] span:last-child", $relations[1]->title)
                ->assertSeeIn("td[field-key='address']", $company->address)
                ->assertSeeIn("td[field-key='site']", $company->site)
                ->assertSeeIn("td[field-key='phone']", $company->phone)
                ->assertSeeIn("td[field-key='contacts']", $company->contacts)
                ->assertSeeIn("td[field-key='rating']", $company->rating)
                ->assertSeeIn("td[field-key='moder_checking']", $company->moder_checking)
                ->assertSeeIn("td[field-key='created_by']", $company->created_by->name);
        });
    }

}
