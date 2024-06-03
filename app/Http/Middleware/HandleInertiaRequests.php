<?php

namespace App\Http\Middleware;

use App\Models\Book;
use App\Models\Convocation;
use App\Models\Event;
use App\Models\Infographic;
use App\Models\Investigation;
use App\Models\Magazine;
use App\Models\Publication;
use App\Models\Resource;
use App\Models\Software;
use App\Models\User;
use App\Models\VinculationDocument;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Spatie\Permission\Models\Role;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
	/**
	 * The root template that is loaded on the first page visit.
	 *
	 * @var string
	 */
	protected $rootView = 'app';

	/**
	 * Determine the current asset version.
	 */
	public function version(Request $request): string|null
	{
		return parent::version($request);
	}

	/**
	 * Define the props that are shared by default.
	 *
	 * @return array<string, mixed>
	 */
	public function share(Request $request): array
	{
		// dd($request->user());
		return array_merge(parent::share($request), [
			'auth' => [
				// 'user' => $request->user(), // Con esto se pasa toda la informaciónd el usuario
				'user' => [
					'name' => fn () => $request->user() ? $request->user()->name : null,
					'email' => fn () => $request->user() ? $request->user()->email : null,
					'role' => fn () => $request->user() ? $request->user()->getMainRole() : null,
				]
			],
			'ziggy' => function () use ($request) {
				return array_merge((new Ziggy)->toArray(), [
					'location' => $request->url(),
				]);
			},
			'data' => function () use ($request) {
				if ($request->user() && $request->user()->role('admin')) {
					return array_merge([
						'books' => Book::get()->count(),
						'magazines' => Magazine::get()->count(),
						'publications' => Publication::get()->count(),
						'investigations' => Investigation::get()->count(),
						'convocations' => Convocation::get()->count(),
						'galleries' => Event::get()->count(),
						'software_resources' => Software::get()->count(),
						'infographics' => Infographic::get()->count(),
						'vinculation_documents' => VinculationDocument::get()->count(),
						'admin_users' => User::role(['admin', 'editor'])->get()->count(),
						'users' => User::role('user')->get()->count(),
						'roles' => Role::get()->count(),
					]);
				}
				return null;
			}
		]);
	}
}
