<?php namespace App\Events;

use App\Events\Event;

use App\Repositories\ImageRepository;
use Illuminate\Queue\SerializesModels;

class Upload extends Event {

	use SerializesModels;

    public $imageRepository;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(ImageRepository $imageRepository)
	{
		$this->imageRepository = $imageRepository;
	}

}
