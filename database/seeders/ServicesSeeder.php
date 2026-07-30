<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                'service_name' => "Conferences &  meeting",
                'service_slug' => Str::slug('Conferences &  meeting', '-'),
                'service_title' => "A meeting for two or a thousand. We personally ensure you the best",
                'short_desc' => "We understand business. You too. Every conference, every time.",
                'long_desc' => "A well-planned and designed conference will yield an increased attendance, a boost in customer satisfaction, authentic connections and a series of memorable moments that drive brand devotion. Our goals are simple- to help you evolve your events, drive your attendees to action and to elevate your brand.
                High level of collaboration with hotels and other service units and its specially trained and experienced team provides an important advantage for the company to develop and implement targeted programs with affordable budgets.
                Whether it is a small meeting for two people, an all-day conference, or an evening event for your employees or clients, we can help.",
                'img_path' => "cm.svg"
            ],
            [
                'service_name' => "Event management",
                'service_slug' => Str::slug('Event management', '-'),
                'service_title' => "Events for a few A milestone of your life for us",
                'short_desc' => "We ensure it's a time of a lifetime. Every event, every time.",
                'long_desc' => "Mice team can assist you in developing a business case for your event and delivering an event that exceeds expectations. Whether you need to generate sales leads, build client loyalty, increase employee morale, roundtable conference or celebrate an important milestone, Mice team has the expertise to ensure your event is a success.",
                'img_path' => "em.svg"
            ],
            [
                'service_name' => "Day Outs",
                'service_slug' => Str::slug('Day Outs', '-'),
                'service_title' => "For the days you wish to have exactly the way you wish",
                'short_desc' => "We understand wanderlust. And budgets too Every destination, every time.",
                'long_desc' => "",
                'img_path' => "do.svg"
            ],
            [
                'service_name' => "Travel management",
                'service_slug' => Str::slug('Travel management', '-'),
                'service_title' => "Travelling makes new friends. Hello from this side!",
                'short_desc' => "We love your dreams. And your preferences too. Every destination, every time.",
                'long_desc' => "Whether tailoring an exquisite 5-star holiday or planning a business trip that simply must go right, trust Mice Hospitality with all your travel planning needs. We offer a complete travel management support for both private and corporate clients. We possess the commercial knowledge and expertise to manage the travel needs of any business, from SMEs looking to outsource their travel planning, to large corporate clients looking for efficient control of their business travel policy.
                We offer a broad range of expertise in all areas of destination management. We can arrange team building days to managing every aspect of your corporate incentive trips. A dedicated Mice team member will attend to every detail of your project from start to finish.",
                'img_path' => "tm.svg"
            ],
            [
                'service_name' => "Tour handling",
                'service_slug' => Str::slug('Tour handling', '-'),
                'service_title' => "From the moment we see you till we see you off, we got you",
                'short_desc' => "Your time is precious. So we plan it to the T.  Every tour, every time.",
                'long_desc' => "Our ground and tour handling services start from the moment the guest lands, till they take off back home, from meet and greet services at the airport to arranging convenient transfer services and VIP services.
                Our customer services team play a leading role in offering the care that is critical to successful ground handling operations. Our team ensures your travel experience is a comfortable and convenient one.
                We are 100% dedicated to ensuring that our clients’ tight schedules are met.",
                'img_path' => "th.svg"
            ],
            [
                'service_name' => "Social events & weddings",
                'service_slug' => Str::slug('Social events & weddings', '-'),
                'service_title' => "Indian Traditions for the Global Indian",
                'short_desc' => "We belong to traditions. Traditions belong to you. Every wedding, every time.",
                'long_desc' => "Your perfect event starts here. We are a social event and wedding planner in Bangalore or wherever else your special day is taking place.
                Mice Hospitality designs, plans and creates luxurious weddings and social events for clients. So, if you need an event or wedding planner – anywhere and everywhere in between – we’re here to help.
                Our expertise lies in consistently planning and executing not just weddings and social events but creating iconic experiences for our clients and their guests.",
                'img_path' => "sw.svg"
            ], 
            [
                'service_name' => "Hotel owners",
                'service_slug' => Str::slug('Hotel owners', '-'),
                'service_title' => "",
                'short_desc' => "",
                'long_desc' => "",
                'img_path' => "ho.svg"
            ],
        ]);
    }
}
