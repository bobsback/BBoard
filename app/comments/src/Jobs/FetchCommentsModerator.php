<?php

namespace Hazzard\Comments\Jobs;

use Hazzard\Comments\Comments\Comment;
use Hazzard\Comments\Comments\Paginator;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class FetchCommentsModerator
 *
 * @package Hazzard\Comments\Jobs
 */
class FetchCommentsModerator extends Job implements SelfHandling
{

    /**
     * @var array
     *
     */
    protected $args;

    /**
     * Create a new job instance.
     *
     */
    public function __construct(array $args)
    {
        $this->args = $args;
    }

    /**
     * Execute the job.
     *
     * @return \Hazzard\Comments\Comments\Paginator
     */
    public function handle()
    {
        $query = Comment::orderBy('created_at', 'DESC')
            ->loadUser()
            ->with('parent.user')
            ->where('page_id', '=', $this->args['board']->id);

        if ($this->args['status'] === 'all') {
            $query->where('status', Comment::APPROVED)->orWhere('status', Comment::PENDING);
        } else {
            $query->where('status', $this->args['status']);
        }

        return $this->paginate($query, $this->args['pageId']);
    }

    /**
     * Paginate the given query into a simple paginator.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $pageId
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    protected function paginate($query, $pageId = null)
    {
        $page = Paginator::resolveCurrentPage();

        $total = $query->getQuery()->getCountForPagination();

        $perPage = isset($this->args['perPage']) ? $this->args['perPage'] : 15;

        $results = $query->forPage($page, $perPage)->get();

        return new Paginator($results, $total, $perPage, $page, [
            'pageCount'   => $this->getPageCount(),
            'statusCount' => $this->getStatusCount($pageId),
        ]);
    }

    /**
     * Get the number of comments grouped by page.
     *
     * @return array
     */
    protected function getPageCount()
    {
        return Comment::select('page_id')
            ->selectRaw('COUNT(id) as aggregate')
            ->groupBy('page_id')->getQuery()
            ->lists('aggregate', 'page_id');
    }

    /**
     * Get the number of comments grouped by status.
     *
     * @param string $pageId
     *
     * @return array
     */
    protected function getStatusCount($pageId = null)
    {
        $query = Comment::select('status')
            ->selectRaw('COUNT(id) as aggregate')
            ->groupBy('status');

        if ($pageId) {
            $query->where('page_id', $pageId);
        }

        return $query->getQuery()->lists('aggregate', 'status');
    }

}
